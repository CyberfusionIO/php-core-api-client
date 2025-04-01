<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\MailHostnameCreateRequest;
use Cyberfusion\CoreApi\Models\MailHostnameUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Models\MailHostnameUpdateRequest;
use Cyberfusion\CoreApi\Requests\MailHostnames\CreateMailHostname;
use Cyberfusion\CoreApi\Requests\MailHostnames\DeleteMailHostname;
use Cyberfusion\CoreApi\Requests\MailHostnames\DeprecatedUpdateMailHostname;
use Cyberfusion\CoreApi\Requests\MailHostnames\ListMailHostnames;
use Cyberfusion\CoreApi\Requests\MailHostnames\ReadMailHostname;
use Cyberfusion\CoreApi\Requests\MailHostnames\UpdateMailHostname;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class MailHostnames extends BaseResource
{
    public function createMailHostname(MailHostnameCreateRequest $mailHostnameCreateRequest): Response
    {
        return $this->connector->send(new CreateMailHostname($mailHostnameCreateRequest));
    }

    public function listMailHostnames(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListMailHostnames($skip, $limit, $filter, $sort));
    }

    public function readMailHostname(int $id): Response
    {
        return $this->connector->send(new ReadMailHostname($id));
    }

    public function deprecatedUpdateMailHostname(
        int $id,
        MailHostnameUpdateDeprecatedRequest $mailHostnameUpdateDeprecatedRequest,
    ): Response {
        return $this->connector->send(new DeprecatedUpdateMailHostname($id, $mailHostnameUpdateDeprecatedRequest));
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
