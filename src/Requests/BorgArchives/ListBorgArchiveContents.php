<?php

namespace Cyberfusion\CoreApi\Requests\BorgArchives;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BorgArchiveContent;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListBorgArchiveContents extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
        private readonly ?string $path = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/borg-archives/%d/contents')
            ->addPathParameter($this->id)
            ->addQueryParameter('path', $this->path)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns Collection<BorgArchiveContent>|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): Collection|DetailMessage
    {
        return DtoBuilder::for($response, BorgArchiveContent::class)->buildCollection();
    }
}
