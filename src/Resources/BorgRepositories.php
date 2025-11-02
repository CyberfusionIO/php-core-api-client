<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\BorgRepositoriesSearchRequest;
use Cyberfusion\CoreApi\Models\BorgRepositoryCreateRequest;
use Cyberfusion\CoreApi\Models\BorgRepositoryUpdateRequest;
use Cyberfusion\CoreApi\Requests\BorgRepositories\CheckBorgRepository;
use Cyberfusion\CoreApi\Requests\BorgRepositories\CreateBorgRepository;
use Cyberfusion\CoreApi\Requests\BorgRepositories\DeleteBorgRepository;
use Cyberfusion\CoreApi\Requests\BorgRepositories\GetBorgArchivesMetadata;
use Cyberfusion\CoreApi\Requests\BorgRepositories\ListBorgRepositories;
use Cyberfusion\CoreApi\Requests\BorgRepositories\PruneBorgRepository;
use Cyberfusion\CoreApi\Requests\BorgRepositories\ReadBorgRepository;
use Cyberfusion\CoreApi\Requests\BorgRepositories\UpdateBorgRepository;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class BorgRepositories extends CoreApiResource
{
    public function createBorgRepository(BorgRepositoryCreateRequest $borgRepositoryCreateRequest): Response
    {
        return $this->connector->send(new CreateBorgRepository($borgRepositoryCreateRequest));
    }

    public function listBorgRepositories(
        ?BorgRepositoriesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListBorgRepositories($includeFilters, $includes));
    }

    public function readBorgRepository(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadBorgRepository($id, $includes));
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
