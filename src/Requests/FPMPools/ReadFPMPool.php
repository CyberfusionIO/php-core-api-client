<?php

namespace Cyberfusion\CoreApi\Requests\FPMPools;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\FPMPoolResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadFPMPool extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
        private readonly array $includes = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/fpm-pools/%d', $this->id);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['includes'] = implode(',', $this->includes);

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns FPMPoolResource
     */
    public function createDtoFromResponse(Response $response): FPMPoolResource
    {
        return FPMPoolResource::fromArray($response->json());
    }
}
