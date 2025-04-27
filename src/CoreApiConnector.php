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
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use Saloon\Http\Auth\AccessTokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\PendingRequest;
use Saloon\Http\Response;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Saloon\Traits\Plugins\HasTimeout;
use Throwable;

class CoreApiConnector extends Connector
{
    use AlwaysThrowOnErrors;
    use HasTimeout;

    private const VERSION = '2.0.0';

    private const USER_AGENT = 'php-core-api-client/' . self::VERSION;

    protected int $connectTimeout = 10;

    protected int $requestTimeout = 30;

    protected ?TokenResource $authenticatedUser = null;

    public function __construct(
        public readonly string $username,
        public readonly string $password,
        public string $baseUrl = 'https://core-api.cyberfusion.io',
    ) {
        $this->baseUrl = rtrim($this->baseUrl, '/');
    }

    public function handlePsrRequest(RequestInterface $request, PendingRequest $pendingRequest): RequestInterface
    {
        return $request->withUri(new Uri($pendingRequest->getUrl()));
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'User-Agent' => self::USER_AGENT,
        ];
    }


    private function getAccessTokenExpiration(): CarbonImmutable
    {
        if ($this->authenticatedUser === null) {
            return Carbon::today()->toImmutable();
        }

        return Carbon::now()
            ->addSeconds($this->authenticatedUser->getExpiresIn())
            ->toImmutable();
    }

    /**
     * @throws AuthenticationException
     */
    public function defaultAuth(): AccessTokenAuthenticator
    {
        if ($this->authenticatedUser === null || $this->getAccessTokenExpiration()->isPast()) {
            $request = new RequestAccessToken(
                bodyLoginAccessToken: new BodyLoginAccessToken(
                    username: $this->username,
                    password: $this->password,
                ),
                baseUrl: $this->baseUrl,
            );

            $response = $request->send();

            $result = $response->dto();

            if ($response->failed()) {
                throw new AuthenticationException($result);
            }

            $this->authenticatedUser = $result;
        }

        return new AccessTokenAuthenticator(
            accessToken: $this
                ->authenticatedUser
                ->getAccessToken(),
            expiresAt: $this->getAccessTokenExpiration(),
        );
    }

    /**
     * @throws RequestFailedException
     * @throws RequestValidationException
     */
    public function getRequestException(Response $response, ?Throwable $senderException): ?Throwable
    {
        try {
            $dto = match($response->status()) {
                422 => $response
                    ->collect('detail')
                    ->map(fn (array $detail) => ValidationError::fromArray($detail)),
                default => DetailMessage::fromArray($response->json()),
            };
        } catch (Throwable) {
            throw new RequestFailedException(
                response: $response,
                previous: $senderException,
            );
        }

        match ($response->status()) {
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

    public function apiUsers(): Resources\APIUsers
    {
        return new Resources\APIUsers($this);
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

    public function cmses(): Resources\CMSes
    {
        return new Resources\CMSes($this);
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

    public function fpmPools(): Resources\FPMPools
    {
        return new Resources\FPMPools($this);
    }

    public function ftpUsers(): Resources\FTPUsers
    {
        return new Resources\FTPUsers($this);
    }

    public function haProxyListens(): Resources\HAProxyListens
    {
        return new Resources\HAProxyListens($this);
    }

    public function haProxyListensToNodes(): Resources\HAProxyListensToNodes
    {
        return new Resources\HAProxyListensToNodes($this);
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

    public function mariaDBEncryptionKeys(): Resources\MariaDBEncryptionKeys
    {
        return new Resources\MariaDBEncryptionKeys($this);
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

    public function rootSSHKeys(): Resources\RootSSHKeys
    {
        return new Resources\RootSSHKeys($this);
    }

    public function securityTXTPolicies(): Resources\SecurityTXTPolicies
    {
        return new Resources\SecurityTXTPolicies($this);
    }

    public function sites(): Resources\Sites
    {
        return new Resources\Sites($this);
    }

    public function sshKeys(): Resources\SSHKeys
    {
        return new Resources\SSHKeys($this);
    }

    public function taskCollections(): Resources\TaskCollections
    {
        return new Resources\TaskCollections($this);
    }

    public function tombstones(): Resources\Tombstones
    {
        return new Resources\Tombstones($this);
    }

    public function UNIXUsers(): Resources\UNIXUsers
    {
        return new Resources\UNIXUsers($this);
    }

    public function URLRedirects(): Resources\URLRedirects
    {
        return new Resources\URLRedirects($this);
    }

    public function virtualHosts(): Resources\VirtualHosts
    {
        return new Resources\VirtualHosts($this);
    }
}
