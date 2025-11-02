<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Enums\LogSortOrderEnum;
use Cyberfusion\CoreApi\Models\ObjectLogsSearchRequest;
use Cyberfusion\CoreApi\Models\RequestLogsSearchRequest;
use Cyberfusion\CoreApi\Requests\Logs\ListAccessLogs;
use Cyberfusion\CoreApi\Requests\Logs\ListErrorLogs;
use Cyberfusion\CoreApi\Requests\Logs\ListObjectLogs;
use Cyberfusion\CoreApi\Requests\Logs\ListRequestLogs;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class Logs extends CoreApiResource
{
    public function listRequestLogs(?RequestLogsSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListRequestLogs($includeFilters, $includes));
    }

    public function listObjectLogs(?ObjectLogsSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListObjectLogs($includeFilters, $includes));
    }

    public function listAccessLogs(
        int $virtualHostId,
        ?string $timestamp = null,
        ?LogSortOrderEnum $sort = null,
        ?int $limit = null,
    ): Response {
        return $this->connector->send(new ListAccessLogs($virtualHostId, $timestamp, $sort, $limit));
    }

    public function listErrorLogs(
        int $virtualHostId,
        ?string $timestamp = null,
        ?LogSortOrderEnum $sort = null,
        ?int $limit = null,
    ): Response {
        return $this->connector->send(new ListErrorLogs($virtualHostId, $timestamp, $sort, $limit));
    }
}
