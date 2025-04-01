<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterIPAddresses;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Use this endpoint to get cluster-specific IP addresses. Most notably, this endpoint returns the IP addresses for the Load Balancers (service account) that the specified cluster uses. These IP addresses should be used in DNS. If the cluster does not have dedicated IP addresses (see the 'Create Cluster IP Address' endpoint), default IP addresses are used.
 */
class ListIPAddressesForCluster extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/ip-addresses')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns ClusterIPAddresses|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): ClusterIPAddresses|DetailMessage|Collection
    {
        return DtoBuilder::for($response, ClusterIPAddresses::class)->build();
    }
}
