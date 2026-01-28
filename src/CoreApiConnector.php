<?php

namespace Cyberfusion\CoreApi;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Cyberfusion\CoreApi\Exceptions\AuthenticationException;
use Cyberfusion\CoreApi\Exceptions\RequestFailedException;
use Cyberfusion\CoreApi\Exceptions\RequestValidationException;
use Cyberfusion\CoreApi\Models\BodyLoginAccessToken;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\TokenResource;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Requests\Login\RequestAccessToken;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Auth\AccessTokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\Paginator;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Saloon\Traits\Plugins\HasTimeout;
use Throwable;

class CoreApiConnector extends Connector implements HasPagination
{
    use AlwaysThrowOnErrors;
    use HasTimeout;

    private const VERSION = '2.14.0';

    private const USER_AGENT = 'php-core-api-client/' . self::VERSION;

    protected int $connectTimeout = 10;

    protected int $requestTimeout = 30;

    protected ?TokenResource $authenticatedUser = null;

    protected ?CarbonImmutable $accessTokenExpiresAt = null;

    public function __construct(
        public readonly string $username,
        public readonly string $password,
        public string $baseUrl = 'https://core-api.cyberfusion.io',
    ) {
        $this->baseUrl = rtrim($this->baseUrl, '/');
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function defaultHeaders(): array
    {
        return [
            'User-Agent' => self::USER_AGENT,
        ];
    }

    private function isAccessTokenExpired(): bool
    {
        if ($this->accessTokenExpiresAt === null) {
            return true;
        }

        return $this
            ->accessTokenExpiresAt
            ->isPast();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function defaultAuth(): AccessTokenAuthenticator
    {
        if ($this->authenticatedUser === null || $this->isAccessTokenExpired()) {
            $request = new RequestAccessToken(
                bodyLoginAccessToken: new BodyLoginAccessToken(
                    username: $this->username,
                    password: $this->password,
                ),
            );

            $this->authenticatedUser = $this
                ->send($request)
                ->dto();
            $this->accessTokenExpiresAt = Carbon::now()
                ->addSeconds($this->authenticatedUser->getExpiresIn())
                ->toImmutable();
        }

        return new AccessTokenAuthenticator(
            accessToken: $this
                ->authenticatedUser
                ->getAccessToken(),
            expiresAt: $this->accessTokenExpiresAt,
        );
    }

    /**
     * @return DetailMessage|Collection<ValidationError>
     * @throws JsonException
     */
    public function getFailedRequestDto(Response $response): DetailMessage|Collection
    {
        return match($response->status()) {
            422 => $response
                ->collect('detail')
                ->map(fn (array $detail) => ValidationError::fromArray($detail)),
            default => DetailMessage::fromArray($response->json()),
        };
    }

    /**
     * @throws RequestFailedException
     * @throws RequestValidationException
     * @throws AuthenticationException
     */
    public function getRequestException(Response $response, ?Throwable $senderException): ?Throwable
    {
        try {
            $dto = $this->getFailedRequestDto($response);
        } catch (Throwable) {
            throw new RequestFailedException(
                response: $response,
                previous: $senderException,
            );
        }

        match ($response->status()) {
            401, 403 => throw new AuthenticationException(
                result: $dto,
                previous: $senderException,
            ),
            422 => throw new RequestValidationException(
                response: $response,
                errors: $dto,
                previous: $senderException,
            ),
            default => throw new RequestFailedException(
                response: $response,
                detailMessage: $dto,
                previous: $senderException,
            ),
        };
    }

    public function paginate(Request $request): Paginator
    {
        return new CoreApiPaginator($this, $request);
    }

    public function basicAuthenticationRealms(): Resources\BasicAuthenticationRealms
    {
        return new Resources\BasicAuthenticationRealms($this);
    }

    public function borgArchives(): Resources\BorgArchives
    {
        return new Resources\BorgArchives($this);
    }

    public function borgRepositories(): Resources\BorgRepositories
    {
        return new Resources\BorgRepositories($this);
    }

    public function certificateManagers(): Resources\CertificateManagers
    {
        return new Resources\CertificateManagers($this);
    }

    public function certificates(): Resources\Certificates
    {
        return new Resources\Certificates($this);
    }

    public function clusters(): Resources\Clusters
    {
        return new Resources\Clusters($this);
    }

    public function cmses(): Resources\Cmses
    {
        return new Resources\Cmses($this);
    }

    public function crons(): Resources\Crons
    {
        return new Resources\Crons($this);
    }

    public function customConfigs(): Resources\CustomConfigs
    {
        return new Resources\CustomConfigs($this);
    }

    public function customConfigSnippets(): Resources\CustomConfigSnippets
    {
        return new Resources\CustomConfigSnippets($this);
    }

    public function customers(): Resources\Customers
    {
        return new Resources\Customers($this);
    }

    public function daemons(): Resources\Daemons
    {
        return new Resources\Daemons($this);
    }

    public function databases(): Resources\Databases
    {
        return new Resources\Databases($this);
    }

    public function databaseUserGrants(): Resources\DatabaseUserGrants
    {
        return new Resources\DatabaseUserGrants($this);
    }

    public function databaseUsers(): Resources\DatabaseUsers
    {
        return new Resources\DatabaseUsers($this);
    }

    public function domainRouters(): Resources\DomainRouters
    {
        return new Resources\DomainRouters($this);
    }

    public function firewallGroups(): Resources\FirewallGroups
    {
        return new Resources\FirewallGroups($this);
    }

    public function firewallRules(): Resources\FirewallRules
    {
        return new Resources\FirewallRules($this);
    }

    public function fpmPools(): Resources\FpmPools
    {
        return new Resources\FpmPools($this);
    }

    public function ftpUsers(): Resources\FtpUsers
    {
        return new Resources\FtpUsers($this);
    }

    public function haProxyListens(): Resources\HaproxyListens
    {
        return new Resources\HaproxyListens($this);
    }

    public function haProxyListensToNodes(): Resources\HaproxyListensToNodes
    {
        return new Resources\HaproxyListensToNodes($this);
    }

    public function health(): Resources\Health
    {
        return new Resources\Health($this);
    }

    public function hostsEntries(): Resources\HostsEntries
    {
        return new Resources\HostsEntries($this);
    }

    public function htPasswdFiles(): Resources\HtpasswdFiles
    {
        return new Resources\HtpasswdFiles($this);
    }

    public function htPasswdUsers(): Resources\HtpasswdUsers
    {
        return new Resources\HtpasswdUsers($this);
    }

    public function login(): Resources\Login
    {
        return new Resources\Login($this);
    }

    public function logs(): Resources\Logs
    {
        return new Resources\Logs($this);
    }

    public function mailAccounts(): Resources\MailAccounts
    {
        return new Resources\MailAccounts($this);
    }

    public function mailAliases(): Resources\MailAliases
    {
        return new Resources\MailAliases($this);
    }

    public function mailDomains(): Resources\MailDomains
    {
        return new Resources\MailDomains($this);
    }

    public function mailHostnames(): Resources\MailHostnames
    {
        return new Resources\MailHostnames($this);
    }

    public function malwares(): Resources\Malwares
    {
        return new Resources\Malwares($this);
    }

    public function mariadbEncryptionKeys(): Resources\MariadbEncryptionKeys
    {
        return new Resources\MariadbEncryptionKeys($this);
    }

    public function nodeAddOns(): Resources\NodeAddOns
    {
        return new Resources\NodeAddOns($this);
    }

    public function nodes(): Resources\Nodes
    {
        return new Resources\Nodes($this);
    }

    public function passengerApps(): Resources\PassengerApps
    {
        return new Resources\PassengerApps($this);
    }

    public function redisInstances(): Resources\RedisInstances
    {
        return new Resources\RedisInstances($this);
    }

    public function regions(): Resources\Regions
    {
        return new Resources\Regions($this);
    }

    public function rootSshKeys(): Resources\RootSshKeys
    {
        return new Resources\RootSshKeys($this);
    }

    public function securityTxtPolicies(): Resources\SecurityTxtPolicies
    {
        return new Resources\SecurityTxtPolicies($this);
    }

    public function sshKeys(): Resources\SshKeys
    {
        return new Resources\SshKeys($this);
    }

    public function taskCollections(): Resources\TaskCollections
    {
        return new Resources\TaskCollections($this);
    }

    public function unixUsers(): Resources\UnixUsers
    {
        return new Resources\UnixUsers($this);
    }

    public function urlRedirects(): Resources\UrlRedirects
    {
        return new Resources\UrlRedirects($this);
    }

    public function virtualHosts(): Resources\VirtualHosts
    {
        return new Resources\VirtualHosts($this);
    }
}
