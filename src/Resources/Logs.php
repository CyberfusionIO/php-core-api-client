<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Requests\Logs\ListAccessLogs;
use Cyberfusion\CoreApi\Requests\Logs\ListErrorLogs;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class Logs extends BaseResource
{
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
