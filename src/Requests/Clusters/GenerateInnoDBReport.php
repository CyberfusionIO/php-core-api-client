<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DatabaseInnodbReport;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * All MariaDB databases are returned. Tables that don't use the InnoDB engine are not.
 */
class GenerateInnoDBReport extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/reports/innodb-data', $this->id);
    }

    /**
     * @throws JsonException
     * @returns DatabaseInnodbReport
     */
    public function createDtoFromResponse(Response $response): DatabaseInnodbReport
    {
        return DatabaseInnodbReport::fromArray($response->json());
    }
}
