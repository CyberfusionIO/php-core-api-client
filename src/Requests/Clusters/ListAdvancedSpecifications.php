<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CompositeSpecificationSatisfyResultResource;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * List advanced specifications. Use this endpoint to determine the objects that the cluster supports. All possible specifications are returned, including those unsatisfied. For every composite specification, the concrete specifications that satisfy the composite specification are returned. To only get a list of satisfied specifications, use the 'List Simple Specifications' endpoint.
 */
class ListAdvancedSpecifications extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/specifications/advanced', $this->id);
    }

    /**
     * @throws JsonException
     * @returns Collection<CompositeSpecificationSatisfyResultResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => CompositeSpecificationSatisfyResultResource::fromArray($item));
    }
}
