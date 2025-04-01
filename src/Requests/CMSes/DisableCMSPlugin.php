<?php

namespace Cyberfusion\CoreApi\Requests\CMSes;

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
 * This endpoint supports only NextCloud CMSes.
 */
class DisableCMSPlugin extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly string $name,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/cmses/%d/plugins/%s/disable')
            ->addPathParameter($this->id)
            ->addPathParameter($this->name)
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
