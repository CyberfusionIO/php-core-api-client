<?php

namespace Cyberfusion\CoreApi\Requests\SecurityTXTPolicies;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\SecurityTXTPolicyResource;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadSecurityTxtPolicy extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/security-txt-policies/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns SecurityTXTPolicyResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): SecurityTXTPolicyResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, SecurityTXTPolicyResource::class)->build();
    }
}
