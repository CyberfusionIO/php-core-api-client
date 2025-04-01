<?php

namespace Cyberfusion\CoreApi\Requests\Logs;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\LogErrorResource;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\Sorter;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Every object is a logged error.
 */
class ListErrorLogs extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $virtualHostId,
        private readonly ?string $timestamp = null,
        private readonly ?Sorter $sort = null,
        private readonly ?int $limit = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/logs/error/%d')
            ->addPathParameter($this->virtualHostId)
            ->addQueryParameter('timestamp', $this->timestamp)
            ->sorter($this->sort)
            ->addQueryParameter('limit', $this->limit)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns Collection<LogErrorResource>|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): Collection|DetailMessage
    {
        return DtoBuilder::for($response, LogErrorResource::class)->buildCollection();
    }
}
