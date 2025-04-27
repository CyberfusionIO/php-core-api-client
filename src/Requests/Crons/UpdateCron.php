<?php

namespace Cyberfusion\CoreApi\Requests\Crons;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CronResource;
use Cyberfusion\CoreApi\Models\CronUpdateRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateCron extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly CronUpdateRequest $cronUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/crons/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->cronUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns CronResource
     */
    public function createDtoFromResponse(Response $response): CronResource
    {
        return CronResource::fromArray($response->json());
    }
}
