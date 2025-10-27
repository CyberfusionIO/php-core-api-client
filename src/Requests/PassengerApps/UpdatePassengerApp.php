<?php

namespace Cyberfusion\CoreApi\Requests\PassengerApps;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\PassengerAppResource;
use Cyberfusion\CoreApi\Models\PassengerAppUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdatePassengerApp extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly PassengerAppUpdateRequest $passengerAppUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/passenger-apps/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->passengerAppUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns PassengerAppResource
     */
    public function createDtoFromResponse(Response $response): PassengerAppResource
    {
        return PassengerAppResource::fromArray($response->json());
    }
}
