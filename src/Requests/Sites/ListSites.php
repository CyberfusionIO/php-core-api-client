<?php

namespace Cyberfusion\CoreApi\Requests\Sites;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\SiteResource;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Http\SoloRequest;

class ListSites extends SoloRequest implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $baseUrl,
        private readonly ?int $skip = null,
        private readonly ?int $limit = null,
        private readonly ?Filter $filter = null,
        private readonly ?Sorter $sort = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for($this->baseUrl . '/api/v1/sites')
            ->addQueryParameter('skip', $this->skip)
            ->addQueryParameter('limit', $this->limit)
            ->filter($this->filter)
            ->sorter($this->sort)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns Collection<SiteResource>|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): Collection|DetailMessage
    {
        return DtoBuilder::for($response, SiteResource::class)->buildCollection();
    }
}
