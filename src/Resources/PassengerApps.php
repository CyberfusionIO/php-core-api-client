<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\PassengerAppCreateNodeJSRequest;
use Cyberfusion\CoreApi\Models\PassengerAppUpdateRequest;
use Cyberfusion\CoreApi\Models\PassengerAppsSearchRequest;
use Cyberfusion\CoreApi\Requests\PassengerApps\CreateNodeJSPassengerApp;
use Cyberfusion\CoreApi\Requests\PassengerApps\DeletePassengerApp;
use Cyberfusion\CoreApi\Requests\PassengerApps\ListPassengerApps;
use Cyberfusion\CoreApi\Requests\PassengerApps\ReadPassengerApp;
use Cyberfusion\CoreApi\Requests\PassengerApps\RestartPassengerApp;
use Cyberfusion\CoreApi\Requests\PassengerApps\UpdatePassengerApp;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class PassengerApps extends CoreApiResource
{
    public function createNodeJSPassengerApp(
        PassengerAppCreateNodeJSRequest $passengerAppCreateNodeJSRequest,
    ): Response {
        return $this->connector->send(new CreateNodeJSPassengerApp($passengerAppCreateNodeJSRequest));
    }

    public function listPassengerApps(
        ?PassengerAppsSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListPassengerApps($includeFilters, $includes));
    }

    public function readPassengerApp(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadPassengerApp($id, $includes));
    }

    public function updatePassengerApp(int $id, PassengerAppUpdateRequest $passengerAppUpdateRequest): Response
    {
        return $this->connector->send(new UpdatePassengerApp($id, $passengerAppUpdateRequest));
    }

    public function deletePassengerApp(int $id, ?bool $deleteOnCluster = null): Response
    {
        return $this->connector->send(new DeletePassengerApp($id, $deleteOnCluster));
    }

    public function restartPassengerApp(int $id, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new RestartPassengerApp($id, $callbackUrl));
    }
}
