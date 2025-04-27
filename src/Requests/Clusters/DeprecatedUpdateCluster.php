<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterResource;
use Cyberfusion\CoreApi\Models\ClusterUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following properties can never be updated to a different value: * `name` * `customer_id` * `site_id` * `unix_users_home_directory` (when not null) * `mariadb_version` (when not null) * `postgresql_version` (when not null) * `nodejs_version` (when not null) * `mariadb_cluster_name` (when not null)
 */
class DeprecatedUpdateCluster extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly ClusterUpdateDeprecatedRequest $clusterUpdateDeprecatedRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->clusterUpdateDeprecatedRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterResource
     */
    public function createDtoFromResponse(Response $response): ClusterResource
    {
        return ClusterResource::fromArray($response->json());
    }
}
