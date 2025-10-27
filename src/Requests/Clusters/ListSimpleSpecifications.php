<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Enums\SpecificationNameEnum;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * List simple specifications. Use this endpoint to determine the objects that the cluster supports. Only satisfied specifications are returned, with no information about the concrete specifications that satisfy the composite specification. To get a full overview of satisfied and unsatisfied specifications, including the concrete specifications that satisfy them, use the 'List Advanced Specifications' endpoint.
 */
class ListSimpleSpecifications extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/specifications/simple', $this->id);
    }

    /**
     * @throws JsonException
     * @returns Collection<SpecificationNameEnum>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (mixed $item) => SpecificationNameEnum::from($item));
    }
}
