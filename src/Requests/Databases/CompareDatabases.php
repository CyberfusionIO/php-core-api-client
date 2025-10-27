<?php

namespace Cyberfusion\CoreApi\Requests\Databases;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DatabaseComparison;
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
        return sprintf('/api/v1/databases/%d/comparison', $this->leftDatabaseId);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['right_database_id'] = $this->rightDatabaseId;

        return array_filter($parameters);
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
