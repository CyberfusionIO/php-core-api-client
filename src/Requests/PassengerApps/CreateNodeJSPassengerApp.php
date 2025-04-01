<?php

namespace Cyberfusion\CoreApi\Requests\PassengerApps;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\PassengerAppCreateNodeJSRequest;
use Cyberfusion\CoreApi\Models\PassengerAppResource;
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
     * @returns PassengerAppResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): PassengerAppResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, PassengerAppResource::class)->build();
    }
}
