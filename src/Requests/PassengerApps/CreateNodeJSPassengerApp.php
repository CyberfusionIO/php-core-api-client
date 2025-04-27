<?php

namespace Cyberfusion\CoreApi\Requests\PassengerApps;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\PassengerAppCreateNodeJSRequest;
use Cyberfusion\CoreApi\Models\PassengerAppResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Compatible cluster groups: * Web The following combinations of attributes are unique: - `name` - `app_root`
 */
class CreateNodeJSPassengerApp extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly PassengerAppCreateNodeJSRequest $passengerAppCreateNodeJSRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/passenger-apps/nodejs')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->passengerAppCreateNodeJSRequest->toArray();
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
