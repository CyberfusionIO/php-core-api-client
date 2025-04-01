<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\HtpasswdFileCreateRequest;
use Cyberfusion\CoreApi\Requests\HtpasswdFiles\CreateHtpasswdFile;
use Cyberfusion\CoreApi\Requests\HtpasswdFiles\DeleteHtpasswdFile;
use Cyberfusion\CoreApi\Requests\HtpasswdFiles\ListHtpasswdFiles;
use Cyberfusion\CoreApi\Requests\HtpasswdFiles\ReadHtpasswdFile;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class HtpasswdFiles extends BaseResource
{
    public function createHtpasswdFile(HtpasswdFileCreateRequest $htpasswdFileCreateRequest): Response
    {
        return $this->connector->send(new CreateHtpasswdFile($htpasswdFileCreateRequest));
    }

    public function listHtpasswdFiles(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListHtpasswdFiles($skip, $limit, $filter, $sort));
    }

    public function readHtpasswdFile(int $id): Response
    {
        return $this->connector->send(new ReadHtpasswdFile($id));
    }

    public function deleteHtpasswdFile(int $id): Response
    {
        return $this->connector->send(new DeleteHtpasswdFile($id));
    }
}
