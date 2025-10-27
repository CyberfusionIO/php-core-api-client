<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\MailDomainCreateRequest;
use Cyberfusion\CoreApi\Models\MailDomainUpdateRequest;
use Cyberfusion\CoreApi\Models\MailDomainsSearchRequest;
use Cyberfusion\CoreApi\Requests\MailDomains\CreateMailDomain;
use Cyberfusion\CoreApi\Requests\MailDomains\DeleteMailDomain;
use Cyberfusion\CoreApi\Requests\MailDomains\ListMailDomains;
use Cyberfusion\CoreApi\Requests\MailDomains\ReadMailDomain;
use Cyberfusion\CoreApi\Requests\MailDomains\UpdateMailDomain;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class MailDomains extends CoreApiResource
{
    public function createMailDomain(MailDomainCreateRequest $mailDomainCreateRequest): Response
    {
        return $this->connector->send(new CreateMailDomain($mailDomainCreateRequest));
    }

    public function listMailDomains(?MailDomainsSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListMailDomains($includeFilters));
    }

    public function readMailDomain(int $id): Response
    {
        return $this->connector->send(new ReadMailDomain($id));
    }

    public function updateMailDomain(int $id, MailDomainUpdateRequest $mailDomainUpdateRequest): Response
    {
        return $this->connector->send(new UpdateMailDomain($id, $mailDomainUpdateRequest));
    }

    public function deleteMailDomain(int $id, ?bool $deleteOnCluster = null): Response
    {
        return $this->connector->send(new DeleteMailDomain($id, $deleteOnCluster));
    }
}
