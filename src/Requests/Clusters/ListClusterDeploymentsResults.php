<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterDeploymentResults;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * To learn what this endpoint does, see the [documentation](#section/Documentation/How-changes-are-deployed). After creating, updating or deleting object(s), deployments can take up to 2 minutes to be created. Until then, this endpoint does not return running deployments. Deployment results are available for 21 days. Deployments are sorted descending (most recent first).
 */
class ListClusterDeploymentsResults extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
        private readonly ?bool $getNonRunning = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/deployments-results')
            ->addPathParameter($this->id)
            ->addQueryParameter('get_non_running', $this->getNonRunning)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns Collection<ClusterDeploymentResults>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => ClusterDeploymentResults::fromArray($item));
    }
}
