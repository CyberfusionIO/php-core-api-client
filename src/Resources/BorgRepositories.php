<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\BorgRepositoryCreateRequest;
use Cyberfusion\CoreApi\Models\BorgRepositoryUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Models\BorgRepositoryUpdateRequest;
use Cyberfusion\CoreApi\Requests\BorgRepositories\CheckBorgRepository;
use Cyberfusion\CoreApi\Requests\BorgRepositories\CreateBorgRepository;
use Cyberfusion\CoreApi\Requests\BorgRepositories\DeleteBorgRepository;
use Cyberfusion\CoreApi\Requests\BorgRepositories\DeprecatedUpdateBorgRepository;
use Cyberfusion\CoreApi\Requests\BorgRepositories\GetBorgArchivesMetadata;
use Cyberfusion\CoreApi\Requests\BorgRepositories\ListBorgRepositories;
use Cyberfusion\CoreApi\Requests\BorgRepositories\PruneBorgRepository;
use Cyberfusion\CoreApi\Requests\BorgRepositories\ReadBorgRepository;
use Cyberfusion\CoreApi\Requests\BorgRepositories\UpdateBorgRepository;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class BorgRepositories extends BaseResource
{
    public function createBorgRepository(BorgRepositoryCreateRequest $borgRepositoryCreateRequest): Response
    {
        return $this->connector->send(new CreateBorgRepository($borgRepositoryCreateRequest));
    }

    public function listBorgRepositories(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListBorgRepositories($skip, $limit, $filter, $sort));
    }

    public function readBorgRepository(int $id): Response
    {
        return $this->connector->send(new ReadBorgRepository($id));
    }

    public function deprecatedUpdateBorgRepository(
        int $id,
        BorgRepositoryUpdateDeprecatedRequest $borgRepositoryUpdateDeprecatedRequest,
    ): Response {
        return $this->connector->send(new DeprecatedUpdateBorgRepository($id, $borgRepositoryUpdateDeprecatedRequest));
    }

    public function updateBorgRepository(int $id, BorgRepositoryUpdateRequest $borgRepositoryUpdateRequest): Response
    {
        return $this->connector->send(new UpdateBorgRepository($id, $borgRepositoryUpdateRequest));
    }

    public function deleteBorgRepository(int $id): Response
    {
        return $this->connector->send(new DeleteBorgRepository($id));
    }

    public function pruneBorgRepository(int $id, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new PruneBorgRepository($id, $callbackUrl));
    }

    public function checkBorgRepository(int $id, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new CheckBorgRepository($id, $callbackUrl));
    }

    public function getBorgArchivesMetadata(int $id): Response
    {
        return $this->connector->send(new GetBorgArchivesMetadata($id));
    }
}
