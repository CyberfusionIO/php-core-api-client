<?php

namespace Cyberfusion\CoreApi\Requests\UNIXUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\UNIXUserComparison;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Compare files and directories of two UNIX users. Sync Toolkit must be enabled on cluster (`sync_toolkit_enabled`). The left and right UNIX users must be on the same cluster.
 */
class CompareUNIXUsers extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $leftUnixUserId,
        private readonly int $rightUnixUserId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/unix-users/%d/comparison')
            ->addPathParameter($this->leftUnixUserId)
            ->addQueryParameter('right_unix_user_id', $this->rightUnixUserId)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns UNIXUserComparison|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): UNIXUserComparison|DetailMessage|Collection
    {
        return DtoBuilder::for($response, UNIXUserComparison::class)->build();
    }
}
