<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\SecurityTxtPoliciesSearchRequest;
use Cyberfusion\CoreApi\Models\SecurityTxtPolicyCreateRequest;
use Cyberfusion\CoreApi\Models\SecurityTxtPolicyUpdateRequest;
use Cyberfusion\CoreApi\Requests\SecurityTxtPolicies\CreateSecurityTxtPolicy;
use Cyberfusion\CoreApi\Requests\SecurityTxtPolicies\DeleteSecurityTxtPolicy;
use Cyberfusion\CoreApi\Requests\SecurityTxtPolicies\ListSecurityTxtPolicies;
use Cyberfusion\CoreApi\Requests\SecurityTxtPolicies\ReadSecurityTxtPolicy;
use Cyberfusion\CoreApi\Requests\SecurityTxtPolicies\UpdateSecurityTxtPolicy;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class SecurityTxtPolicies extends CoreApiResource
{
    public function createSecurityTxtPolicy(SecurityTxtPolicyCreateRequest $securityTxtPolicyCreateRequest): Response
    {
        return $this->connector->send(new CreateSecurityTxtPolicy($securityTxtPolicyCreateRequest));
    }

    public function listSecurityTxtPolicies(
        ?SecurityTxtPoliciesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListSecurityTxtPolicies($includeFilters, $includes));
    }

    public function readSecurityTxtPolicy(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadSecurityTxtPolicy($id, $includes));
    }

    public function updateSecurityTxtPolicy(
        int $id,
        SecurityTxtPolicyUpdateRequest $securityTxtPolicyUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateSecurityTxtPolicy($id, $securityTxtPolicyUpdateRequest));
    }

    public function deleteSecurityTxtPolicy(int $id): Response
    {
        return $this->connector->send(new DeleteSecurityTxtPolicy($id));
    }
}
