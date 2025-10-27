<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\BorgArchiveCreateRequest;
use Cyberfusion\CoreApi\Models\BorgArchivesSearchRequest;
use Cyberfusion\CoreApi\Requests\BorgArchives\CreateBorgArchive;
use Cyberfusion\CoreApi\Requests\BorgArchives\DownloadBorgArchive;
use Cyberfusion\CoreApi\Requests\BorgArchives\GetBorgArchiveMetadata;
use Cyberfusion\CoreApi\Requests\BorgArchives\ListBorgArchiveContents;
use Cyberfusion\CoreApi\Requests\BorgArchives\ListBorgArchives;
use Cyberfusion\CoreApi\Requests\BorgArchives\ReadBorgArchive;
use Cyberfusion\CoreApi\Requests\BorgArchives\RestoreBorgArchive;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class BorgArchives extends CoreApiResource
{
    public function createBorgArchive(
        BorgArchiveCreateRequest $borgArchiveCreateRequest,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new CreateBorgArchive($borgArchiveCreateRequest, $callbackUrl));
    }

    public function listBorgArchives(?BorgArchivesSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListBorgArchives($includeFilters));
    }

    public function readBorgArchive(int $id): Response
    {
        return $this->connector->send(new ReadBorgArchive($id));
    }

    public function getBorgArchiveMetadata(int $id): Response
    {
        return $this->connector->send(new GetBorgArchiveMetadata($id));
    }

    public function restoreBorgArchive(int $id, ?string $callbackUrl = null, ?string $path = null): Response
    {
        return $this->connector->send(new RestoreBorgArchive($id, $callbackUrl, $path));
    }

    public function listBorgArchiveContents(int $id, ?string $path = null): Response
    {
        return $this->connector->send(new ListBorgArchiveContents($id, $path));
    }

    public function downloadBorgArchive(int $id, ?string $callbackUrl = null, ?string $path = null): Response
    {
        return $this->connector->send(new DownloadBorgArchive($id, $callbackUrl, $path));
    }
}
