<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\SecurityTXTPolicyCreateRequest;
use Cyberfusion\CoreApi\Models\SecurityTXTPolicyUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Models\SecurityTXTPolicyUpdateRequest;
use Cyberfusion\CoreApi\Requests\SecurityTXTPolicies\CreateSecurityTxtPolicy;
use Cyberfusion\CoreApi\Requests\SecurityTXTPolicies\DeleteSecurityTxtPolicy;
use Cyberfusion\CoreApi\Requests\SecurityTXTPolicies\DeprecatedUpdateSecurityTxtPolicy;
use Cyberfusion\CoreApi\Requests\SecurityTXTPolicies\ListSecurityTxtPolicies;
use Cyberfusion\CoreApi\Requests\SecurityTXTPolicies\ReadSecurityTxtPolicy;
use Cyberfusion\CoreApi\Requests\SecurityTXTPolicies\UpdateSecurityTxtPolicy;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class SecurityTXTPolicies extends BaseResource
{
    public function createSecurityTxtPolicy(SecurityTXTPolicyCreateRequest $securityTXTPolicyCreateRequest): Response
    {
        return $this->connector->send(new CreateSecurityTxtPolicy($securityTXTPolicyCreateRequest));
    }

    public function listSecurityTxtPolicies(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListSecurityTxtPolicies($skip, $limit, $filter, $sort));
    }

    public function readSecurityTxtPolicy(int $id): Response
    {
        return $this->connector->send(new ReadSecurityTxtPolicy($id));
    }

    public function deprecatedUpdateSecurityTxtPolicy(
        int $id,
        SecurityTXTPolicyUpdateDeprecatedRequest $securityTXTPolicyUpdateDeprecatedRequest,
    ): Response {
        return $this->connector->send(new DeprecatedUpdateSecurityTxtPolicy($id, $securityTXTPolicyUpdateDeprecatedRequest));
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
