<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\PassengerAppCreateNodeJSRequest;
use Cyberfusion\CoreApi\Models\PassengerAppUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Models\PassengerAppUpdateRequest;
use Cyberfusion\CoreApi\Requests\PassengerApps\CreateNodeJSPassengerApp;
use Cyberfusion\CoreApi\Requests\PassengerApps\DeletePassengerApp;
use Cyberfusion\CoreApi\Requests\PassengerApps\DeprecatedUpdatePassengerApp;
use Cyberfusion\CoreApi\Requests\PassengerApps\ListPassengerApps;
use Cyberfusion\CoreApi\Requests\PassengerApps\ReadPassengerApp;
use Cyberfusion\CoreApi\Requests\PassengerApps\RestartPassengerApp;
use Cyberfusion\CoreApi\Requests\PassengerApps\UpdatePassengerApp;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class PassengerApps extends BaseResource
{
    public function createNodeJSPassengerApp(
        PassengerAppCreateNodeJSRequest $passengerAppCreateNodeJSRequest,
    ): Response {
        return $this->connector->send(new CreateNodeJSPassengerApp($passengerAppCreateNodeJSRequest));
    }

    public function listPassengerApps(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListPassengerApps($skip, $limit, $filter, $sort));
    }

    public function readPassengerApp(int $id): Response
    {
        return $this->connector->send(new ReadPassengerApp($id));
    }

    public function deprecatedUpdatePassengerApp(
        int $id,
        PassengerAppUpdateDeprecatedRequest $passengerAppUpdateDeprecatedRequest,
    ): Response {
        return $this->connector->send(new DeprecatedUpdatePassengerApp($id, $passengerAppUpdateDeprecatedRequest));
    }

    public function updatePassengerApp(int $id, PassengerAppUpdateRequest $passengerAppUpdateRequest): Response
    {
        return $this->connector->send(new UpdatePassengerApp($id, $passengerAppUpdateRequest));
    }

    public function deletePassengerApp(int $id): Response
    {
        return $this->connector->send(new DeletePassengerApp($id));
    }

    public function restartPassengerApp(int $id, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new RestartPassengerApp($id, $callbackUrl));
    }
}
