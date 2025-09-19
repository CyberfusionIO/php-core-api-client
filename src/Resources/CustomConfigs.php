<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\CustomConfigCreateRequest;
use Cyberfusion\CoreApi\Models\CustomConfigUpdateRequest;
use Cyberfusion\CoreApi\Requests\CustomConfigs\CreateCustomConfig;
use Cyberfusion\CoreApi\Requests\CustomConfigs\DeleteCustomConfig;
use Cyberfusion\CoreApi\Requests\CustomConfigs\ListCustomConfigs;
use Cyberfusion\CoreApi\Requests\CustomConfigs\ReadCustomConfig;
use Cyberfusion\CoreApi\Requests\CustomConfigs\UpdateCustomConfig;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class CustomConfigs extends BaseResource
{
    public function createCustomConfig(CustomConfigCreateRequest $customConfigCreateRequest): Response
    {
        return $this->connector->send(new CreateCustomConfig($customConfigCreateRequest));
    }

    public function listCustomConfigs(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListCustomConfigs($skip, $limit, $filter, $sort));
    }

    public function readCustomConfig(int $id): Response
    {
        return $this->connector->send(new ReadCustomConfig($id));
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
