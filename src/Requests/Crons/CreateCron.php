<?php

namespace Cyberfusion\CoreApi\Requests\Crons;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CronCreateRequest;
use Cyberfusion\CoreApi\Models\CronResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `name`
 */
class CreateCron extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly CronCreateRequest $cronCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/crons')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->cronCreateRequest->toArray();
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
