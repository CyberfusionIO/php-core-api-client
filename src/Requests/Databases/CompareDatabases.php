<?php

namespace Cyberfusion\CoreApi\Requests\Databases;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DatabaseComparison;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * The left and right databases must be on the same cluster.
 */
class CompareDatabases extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $leftDatabaseId,
        private readonly int $rightDatabaseId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/databases/%d/comparison')
            ->addPathParameter($this->leftDatabaseId)
            ->addQueryParameter('right_database_id', $this->rightDatabaseId)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns DatabaseComparison
     */
    public function createDtoFromResponse(Response $response): DatabaseComparison
    {
        return DatabaseComparison::fromArray($response->json());
    }
}
