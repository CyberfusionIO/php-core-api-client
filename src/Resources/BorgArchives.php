<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\BorgArchiveCreateDatabaseRequest;
use Cyberfusion\CoreApi\Models\BorgArchiveCreateUNIXUserRequest;
use Cyberfusion\CoreApi\Requests\BorgArchives\CreateBorgArchiveForDatabase;
use Cyberfusion\CoreApi\Requests\BorgArchives\CreateBorgArchiveForUNIXUser;
use Cyberfusion\CoreApi\Requests\BorgArchives\DownloadBorgArchive;
use Cyberfusion\CoreApi\Requests\BorgArchives\GetBorgArchiveMetadata;
use Cyberfusion\CoreApi\Requests\BorgArchives\ListBorgArchiveContents;
use Cyberfusion\CoreApi\Requests\BorgArchives\ListBorgArchives;
use Cyberfusion\CoreApi\Requests\BorgArchives\ReadBorgArchive;
use Cyberfusion\CoreApi\Requests\BorgArchives\RestoreBorgArchive;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class BorgArchives extends BaseResource
{
    public function createBorgArchiveForDatabase(
        BorgArchiveCreateDatabaseRequest $borgArchiveCreateDatabaseRequest,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new CreateBorgArchiveForDatabase($borgArchiveCreateDatabaseRequest, $callbackUrl));
    }

    public function createBorgArchiveForUNIXUser(
        BorgArchiveCreateUNIXUserRequest $borgArchiveCreateUNIXUserRequest,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new CreateBorgArchiveForUNIXUser($borgArchiveCreateUNIXUserRequest, $callbackUrl));
    }

    public function listBorgArchives(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListBorgArchives($skip, $limit, $filter, $sort));
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
