<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\MailAliasCreateRequest;
use Cyberfusion\CoreApi\Models\MailAliasUpdateRequest;
use Cyberfusion\CoreApi\Models\MailAliasesSearchRequest;
use Cyberfusion\CoreApi\Requests\MailAliases\CreateMailAlias;
use Cyberfusion\CoreApi\Requests\MailAliases\DeleteMailAlias;
use Cyberfusion\CoreApi\Requests\MailAliases\ListMailAliases;
use Cyberfusion\CoreApi\Requests\MailAliases\ReadMailAlias;
use Cyberfusion\CoreApi\Requests\MailAliases\UpdateMailAlias;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class MailAliases extends CoreApiResource
{
    public function createMailAlias(MailAliasCreateRequest $mailAliasCreateRequest): Response
    {
        return $this->connector->send(new CreateMailAlias($mailAliasCreateRequest));
    }

    public function listMailAliases(?MailAliasesSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListMailAliases($includeFilters, $includes));
    }

    public function readMailAlias(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadMailAlias($id, $includes));
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
