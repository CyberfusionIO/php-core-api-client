<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\MailHostnameCreateRequest;
use Cyberfusion\CoreApi\Models\MailHostnameUpdateRequest;
use Cyberfusion\CoreApi\Models\MailHostnamesSearchRequest;
use Cyberfusion\CoreApi\Requests\MailHostnames\CreateMailHostname;
use Cyberfusion\CoreApi\Requests\MailHostnames\DeleteMailHostname;
use Cyberfusion\CoreApi\Requests\MailHostnames\ListMailHostnames;
use Cyberfusion\CoreApi\Requests\MailHostnames\ReadMailHostname;
use Cyberfusion\CoreApi\Requests\MailHostnames\UpdateMailHostname;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class MailHostnames extends CoreApiResource
{
    public function createMailHostname(MailHostnameCreateRequest $mailHostnameCreateRequest): Response
    {
        return $this->connector->send(new CreateMailHostname($mailHostnameCreateRequest));
    }

    public function listMailHostnames(?MailHostnamesSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListMailHostnames($includeFilters));
    }

    public function readMailHostname(int $id): Response
    {
        return $this->connector->send(new ReadMailHostname($id));
    }

    public function updateMailHostname(int $id, MailHostnameUpdateRequest $mailHostnameUpdateRequest): Response
    {
        return $this->connector->send(new UpdateMailHostname($id, $mailHostnameUpdateRequest));
    }

    public function deleteMailHostname(int $id): Response
    {
        return $this->connector->send(new DeleteMailHostname($id));
    }
}
