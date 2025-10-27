<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\BasicAuthenticationRealmCreateRequest;
use Cyberfusion\CoreApi\Models\BasicAuthenticationRealmUpdateRequest;
use Cyberfusion\CoreApi\Models\BasicAuthenticationRealmsSearchRequest;
use Cyberfusion\CoreApi\Requests\BasicAuthenticationRealms\CreateBasicAuthenticationRealm;
use Cyberfusion\CoreApi\Requests\BasicAuthenticationRealms\DeleteBasicAuthenticationRealm;
use Cyberfusion\CoreApi\Requests\BasicAuthenticationRealms\ListBasicAuthenticationRealms;
use Cyberfusion\CoreApi\Requests\BasicAuthenticationRealms\ReadBasicAuthenticationRealm;
use Cyberfusion\CoreApi\Requests\BasicAuthenticationRealms\UpdateBasicAuthenticationRealm;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class BasicAuthenticationRealms extends CoreApiResource
{
    public function createBasicAuthenticationRealm(
        BasicAuthenticationRealmCreateRequest $basicAuthenticationRealmCreateRequest,
    ): Response {
        return $this->connector->send(new CreateBasicAuthenticationRealm($basicAuthenticationRealmCreateRequest));
    }

    public function listBasicAuthenticationRealms(
        ?BasicAuthenticationRealmsSearchRequest $includeFilters = null,
    ): Paginator {
        return $this->connector->paginate(new ListBasicAuthenticationRealms($includeFilters));
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
