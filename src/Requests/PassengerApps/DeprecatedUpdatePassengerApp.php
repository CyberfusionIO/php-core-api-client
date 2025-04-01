<?php

namespace Cyberfusion\CoreApi\Requests\PassengerApps;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\PassengerAppResource;
use Cyberfusion\CoreApi\Models\PassengerAppUpdateDeprecatedRequest;
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
 * The following properties can never be updated to a different value: * `name` * `app_type` * `port` * `app_root`
 */
class DeprecatedUpdatePassengerApp extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly PassengerAppUpdateDeprecatedRequest $passengerAppUpdateDeprecatedRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/passenger-apps/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->passengerAppUpdateDeprecatedRequest->toArray();
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
