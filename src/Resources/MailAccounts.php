<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\MailAccountCreateRequest;
use Cyberfusion\CoreApi\Models\MailAccountUpdateRequest;
use Cyberfusion\CoreApi\Requests\MailAccounts\CreateMailAccount;
use Cyberfusion\CoreApi\Requests\MailAccounts\DeleteMailAccount;
use Cyberfusion\CoreApi\Requests\MailAccounts\ListMailAccountUsages;
use Cyberfusion\CoreApi\Requests\MailAccounts\ListMailAccounts;
use Cyberfusion\CoreApi\Requests\MailAccounts\ReadMailAccount;
use Cyberfusion\CoreApi\Requests\MailAccounts\UpdateMailAccount;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class MailAccounts extends BaseResource
{
    public function createMailAccount(MailAccountCreateRequest $mailAccountCreateRequest): Response
    {
        return $this->connector->send(new CreateMailAccount($mailAccountCreateRequest));
    }

    public function listMailAccounts(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListMailAccounts($skip, $limit, $filter, $sort));
    }

    public function readMailAccount(int $id): Response
    {
        return $this->connector->send(new ReadMailAccount($id));
    }

    public function updateMailAccount(int $id, MailAccountUpdateRequest $mailAccountUpdateRequest): Response
    {
        return $this->connector->send(new UpdateMailAccount($id, $mailAccountUpdateRequest));
    }

    public function deleteMailAccount(int $id, ?bool $deleteOnCluster = null): Response
    {
        return $this->connector->send(new DeleteMailAccount($id, $deleteOnCluster));
    }

    public function listMailAccountUsages(int $mailAccountId, string $timestamp, ?string $timeUnit = null): Response
    {
        return $this->connector->send(new ListMailAccountUsages($mailAccountId, $timestamp, $timeUnit));
    }
}
