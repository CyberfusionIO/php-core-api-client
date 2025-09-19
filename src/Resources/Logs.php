<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Requests\Logs\ListAccessLogs;
use Cyberfusion\CoreApi\Requests\Logs\ListErrorLogs;
use Cyberfusion\CoreApi\Requests\Logs\ListObjectLogs;
use Cyberfusion\CoreApi\Requests\Logs\ListRequestLogs;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class Logs extends BaseResource
{
    public function listRequestLogs(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListRequestLogs($skip, $limit, $filter, $sort));
    }

    public function listObjectLogs(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListObjectLogs($skip, $limit, $filter, $sort));
    }

    public function listAccessLogs(
        int $virtualHostId,
        ?string $timestamp = null,
        ?Sorter $sort = null,
        ?int $limit = null,
    ): Response {
        return $this->connector->send(new ListAccessLogs($virtualHostId, $timestamp, $sort, $limit));
    }

    public function listErrorLogs(
        int $virtualHostId,
        ?string $timestamp = null,
        ?Sorter $sort = null,
        ?int $limit = null,
    ): Response {
        return $this->connector->send(new ListErrorLogs($virtualHostId, $timestamp, $sort, $limit));
    }
}
