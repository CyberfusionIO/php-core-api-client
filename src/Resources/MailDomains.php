<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\MailDomainCreateRequest;
use Cyberfusion\CoreApi\Models\MailDomainUpdateRequest;
use Cyberfusion\CoreApi\Requests\MailDomains\CreateMailDomain;
use Cyberfusion\CoreApi\Requests\MailDomains\DeleteMailDomain;
use Cyberfusion\CoreApi\Requests\MailDomains\ListMailDomains;
use Cyberfusion\CoreApi\Requests\MailDomains\ReadMailDomain;
use Cyberfusion\CoreApi\Requests\MailDomains\UpdateMailDomain;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class MailDomains extends BaseResource
{
    public function createMailDomain(MailDomainCreateRequest $mailDomainCreateRequest): Response
    {
        return $this->connector->send(new CreateMailDomain($mailDomainCreateRequest));
    }

    public function listMailDomains(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListMailDomains($skip, $limit, $filter, $sort));
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
