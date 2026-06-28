<?php

namespace Cyberfusion\CoreApi\Requests\Cmses;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CmsWoocommerceHpos;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Check if WooCommerce High Performance Order Storage (HPOS) is enabled. This endpoint supports only WordPress CMSes.
 */
class GetCmsWoocommerceHpos extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/cmses/%d/hpos', $this->id);
    }

    /**
     * @throws JsonException
     * @returns CmsWoocommerceHpos
     */
    public function createDtoFromResponse(Response $response): CmsWoocommerceHpos
    {
        return CmsWoocommerceHpos::fromArray($response->json());
    }
}
