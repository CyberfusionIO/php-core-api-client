<?php

namespace Cyberfusion\CoreApi\Requests\UNIXUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\UNIXUserResource;
use Cyberfusion\CoreApi\Models\UNIXUserUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following properties can never be updated to a different value: * `username` * `unix_id` * `home_directory` * `ssh_directory` * `virtual_hosts_directory` * `mail_domains_directory` * `borg_repositories_directory`
 */
class DeprecatedUpdateUNIXUser extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly UNIXUserUpdateDeprecatedRequest $uNIXUserUpdateDeprecatedRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/unix-users/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->uNIXUserUpdateDeprecatedRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns UNIXUserResource
     */
    public function createDtoFromResponse(Response $response): UNIXUserResource
    {
        return UNIXUserResource::fromArray($response->json());
    }
}
