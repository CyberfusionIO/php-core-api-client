<?php

namespace Cyberfusion\CoreApi\Requests\Crons;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CronResource;
use Cyberfusion\CoreApi\Models\CronUpdateRequest;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
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
     * @returns CronResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): CronResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, CronResource::class)->build();
    }
}
