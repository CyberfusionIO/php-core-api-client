<?php

namespace Cyberfusion\CoreApi\Requests\PassengerApps;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\PassengerAppCreateNodejsRequest;
use Cyberfusion\CoreApi\Models\PassengerAppResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateNodejsPassengerApp extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly PassengerAppCreateNodejsRequest $passengerAppCreateNodejsRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/passenger-apps/nodejs';
    }

    public function defaultBody(): array
    {
        return $this->passengerAppCreateNodejsRequest->toArray();
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
