<?php

namespace Cyberfusion\CoreApi\Requests\Cmses;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CmsAutoInstallWordpressRequest;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Automatically create a database, database user, and grant, then deploy and install WordPress. The cluster must have exactly one PHP node, and that node must also have the MariaDB group. The database host is always 'localhost' because there is no reliable way of determining how else the MariaDB instance may be accessible (e.g. via HAProxy Listen or Hosts Entry). The installation is done on a PHP node, so MariaDB must be on that node too (because localhost). The cluster may only have one PHP/MariaDB node, because if we run on a PHP node that does have MariaDB but MariaDB is not master on that node, the installation would fail — writes to replicas are not allowed.
 */
class AutoInstallWordpress extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly CmsAutoInstallWordpressRequest $cmsAutoInstallWordpressRequest,
        private readonly ?string $callbackUrl = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/cmses/%d/install/wordpress/auto', $this->id);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['callback_url'] = $this->callbackUrl;

        return array_filter($parameters);
    }

    public function defaultBody(): array
    {
        return $this->cmsAutoInstallWordpressRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns TaskCollectionResource
     */
    public function createDtoFromResponse(Response $response): TaskCollectionResource
    {
        return TaskCollectionResource::fromArray($response->json());
    }
}
