<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\BasicAuthenticationRealmCreateRequest;
use Cyberfusion\CoreApi\Models\BasicAuthenticationRealmUpdateRequest;
use Cyberfusion\CoreApi\Requests\BasicAuthenticationRealms\CreateBasicAuthenticationRealm;
use Cyberfusion\CoreApi\Requests\BasicAuthenticationRealms\DeleteBasicAuthenticationRealm;
use Cyberfusion\CoreApi\Requests\BasicAuthenticationRealms\ListBasicAuthenticationRealms;
use Cyberfusion\CoreApi\Requests\BasicAuthenticationRealms\ReadBasicAuthenticationRealm;
use Cyberfusion\CoreApi\Requests\BasicAuthenticationRealms\UpdateBasicAuthenticationRealm;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class BasicAuthenticationRealms extends BaseResource
{
    public function createBasicAuthenticationRealm(
        BasicAuthenticationRealmCreateRequest $basicAuthenticationRealmCreateRequest,
    ): Response {
        return $this->connector->send(new CreateBasicAuthenticationRealm($basicAuthenticationRealmCreateRequest));
    }

    public function listBasicAuthenticationRealms(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListBasicAuthenticationRealms($skip, $limit, $filter, $sort));
    }

    public function readBasicAuthenticationRealm(int $id): Response
    {
        return $this->connector->send(new ReadBasicAuthenticationRealm($id));
    }

    public function updateBasicAuthenticationRealm(
        int $id,
        BasicAuthenticationRealmUpdateRequest $basicAuthenticationRealmUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateBasicAuthenticationRealm($id, $basicAuthenticationRealmUpdateRequest));
    }

    public function deleteBasicAuthenticationRealm(int $id): Response
    {
        return $this->connector->send(new DeleteBasicAuthenticationRealm($id));
    }
}
