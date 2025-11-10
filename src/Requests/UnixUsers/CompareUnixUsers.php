<?php

namespace Cyberfusion\CoreApi\Requests\UnixUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\UnixUserComparison;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Compare files and directories of two UNIX users. The left and right UNIX users must be on the same cluster.
 */
class CompareUnixUsers extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $leftUnixUserId,
        private readonly int $rightUnixUserId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/unix-users/%d/comparison', $this->leftUnixUserId);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['right_unix_user_id'] = $this->rightUnixUserId;

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns UnixUserComparison
     */
    public function createDtoFromResponse(Response $response): UnixUserComparison
    {
        return UnixUserComparison::fromArray($response->json());
    }
}
