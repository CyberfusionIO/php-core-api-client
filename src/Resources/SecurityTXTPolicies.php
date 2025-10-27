<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\SecurityTXTPolicyCreateRequest;
use Cyberfusion\CoreApi\Models\SecurityTXTPolicyUpdateRequest;
use Cyberfusion\CoreApi\Models\SecurityTxtPoliciesSearchRequest;
use Cyberfusion\CoreApi\Requests\SecurityTXTPolicies\CreateSecurityTxtPolicy;
use Cyberfusion\CoreApi\Requests\SecurityTXTPolicies\DeleteSecurityTxtPolicy;
use Cyberfusion\CoreApi\Requests\SecurityTXTPolicies\ListSecurityTxtPolicies;
use Cyberfusion\CoreApi\Requests\SecurityTXTPolicies\ReadSecurityTxtPolicy;
use Cyberfusion\CoreApi\Requests\SecurityTXTPolicies\UpdateSecurityTxtPolicy;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class SecurityTXTPolicies extends CoreApiResource
{
    public function createSecurityTxtPolicy(SecurityTXTPolicyCreateRequest $securityTXTPolicyCreateRequest): Response
    {
        return $this->connector->send(new CreateSecurityTxtPolicy($securityTXTPolicyCreateRequest));
    }

    public function listSecurityTxtPolicies(?SecurityTxtPoliciesSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListSecurityTxtPolicies($includeFilters));
    }

    public function readSecurityTxtPolicy(int $id): Response
    {
        return $this->connector->send(new ReadSecurityTxtPolicy($id));
    }

    public function updateSecurityTxtPolicy(
        int $id,
        SecurityTXTPolicyUpdateRequest $securityTXTPolicyUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateSecurityTxtPolicy($id, $securityTXTPolicyUpdateRequest));
    }

    public function deleteSecurityTxtPolicy(int $id): Response
    {
        return $this->connector->send(new DeleteSecurityTxtPolicy($id));
    }
}
