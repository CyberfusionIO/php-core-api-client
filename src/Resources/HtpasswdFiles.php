<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\HtpasswdFileCreateRequest;
use Cyberfusion\CoreApi\Models\HtpasswdFilesSearchRequest;
use Cyberfusion\CoreApi\Requests\HtpasswdFiles\CreateHtpasswdFile;
use Cyberfusion\CoreApi\Requests\HtpasswdFiles\DeleteHtpasswdFile;
use Cyberfusion\CoreApi\Requests\HtpasswdFiles\ListHtpasswdFiles;
use Cyberfusion\CoreApi\Requests\HtpasswdFiles\ReadHtpasswdFile;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class HtpasswdFiles extends CoreApiResource
{
    public function createHtpasswdFile(HtpasswdFileCreateRequest $htpasswdFileCreateRequest): Response
    {
        return $this->connector->send(new CreateHtpasswdFile($htpasswdFileCreateRequest));
    }

    public function listHtpasswdFiles(?HtpasswdFilesSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListHtpasswdFiles($includeFilters));
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
