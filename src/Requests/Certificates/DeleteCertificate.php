<?php

namespace Cyberfusion\CoreApi\Requests\Certificates;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Creates Tombstone object.
 */
class DeleteCertificate extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/certificates/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): DetailMessage|Collection
    {
        return DtoBuilder::for($response, DetailMessage::class)->build();
    }
}
