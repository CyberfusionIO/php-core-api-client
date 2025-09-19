<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\MailAliasCreateRequest;
use Cyberfusion\CoreApi\Models\MailAliasUpdateRequest;
use Cyberfusion\CoreApi\Requests\MailAliases\CreateMailAlias;
use Cyberfusion\CoreApi\Requests\MailAliases\DeleteMailAlias;
use Cyberfusion\CoreApi\Requests\MailAliases\ListMailAliases;
use Cyberfusion\CoreApi\Requests\MailAliases\ReadMailAlias;
use Cyberfusion\CoreApi\Requests\MailAliases\UpdateMailAlias;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class MailAliases extends BaseResource
{
    public function createMailAlias(MailAliasCreateRequest $mailAliasCreateRequest): Response
    {
        return $this->connector->send(new CreateMailAlias($mailAliasCreateRequest));
    }

    public function listMailAliases(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListMailAliases($skip, $limit, $filter, $sort));
    }

    public function readMailAlias(int $id): Response
    {
        return $this->connector->send(new ReadMailAlias($id));
    }

    public function updateMailAlias(int $id, MailAliasUpdateRequest $mailAliasUpdateRequest): Response
    {
        return $this->connector->send(new UpdateMailAlias($id, $mailAliasUpdateRequest));
    }

    public function deleteMailAlias(int $id): Response
    {
        return $this->connector->send(new DeleteMailAlias($id));
    }
}
