<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\CustomConfigCreateRequest;
use Cyberfusion\CoreApi\Models\CustomConfigUpdateRequest;
use Cyberfusion\CoreApi\Models\CustomConfigsSearchRequest;
use Cyberfusion\CoreApi\Requests\CustomConfigs\CreateCustomConfig;
use Cyberfusion\CoreApi\Requests\CustomConfigs\DeleteCustomConfig;
use Cyberfusion\CoreApi\Requests\CustomConfigs\ListCustomConfigs;
use Cyberfusion\CoreApi\Requests\CustomConfigs\ReadCustomConfig;
use Cyberfusion\CoreApi\Requests\CustomConfigs\UpdateCustomConfig;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class CustomConfigs extends CoreApiResource
{
    public function createCustomConfig(CustomConfigCreateRequest $customConfigCreateRequest): Response
    {
        return $this->connector->send(new CreateCustomConfig($customConfigCreateRequest));
    }

    public function listCustomConfigs(
        ?CustomConfigsSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListCustomConfigs($includeFilters, $includes));
    }

    public function readCustomConfig(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadCustomConfig($id, $includes));
    }

    public function updateCustomConfig(int $id, CustomConfigUpdateRequest $customConfigUpdateRequest): Response
    {
        return $this->connector->send(new UpdateCustomConfig($id, $customConfigUpdateRequest));
    }

    public function deleteCustomConfig(int $id): Response
    {
        return $this->connector->send(new DeleteCustomConfig($id));
    }
}
