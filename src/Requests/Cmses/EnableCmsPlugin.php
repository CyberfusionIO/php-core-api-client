<?php

namespace Cyberfusion\CoreApi\Requests\Cmses;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * This endpoint supports only Nextcloud CMSes.
 */
class EnableCmsPlugin extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly string $name,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/cmses/%d/plugins/%s/enable', $this->id, $this->name);
    }

    /**
     * @throws JsonException
     * @returns DetailMessage
     */
    public function createDtoFromResponse(Response $response): DetailMessage
    {
        return DetailMessage::fromArray($response->json());
    }
}
