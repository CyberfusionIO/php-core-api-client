<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Enums\TimeUnitEnum;
use Cyberfusion\CoreApi\Models\MailAccountCreateRequest;
use Cyberfusion\CoreApi\Models\MailAccountUpdateRequest;
use Cyberfusion\CoreApi\Models\MailAccountsSearchRequest;
use Cyberfusion\CoreApi\Requests\MailAccounts\CreateMailAccount;
use Cyberfusion\CoreApi\Requests\MailAccounts\DeleteMailAccount;
use Cyberfusion\CoreApi\Requests\MailAccounts\ListMailAccountUsages;
use Cyberfusion\CoreApi\Requests\MailAccounts\ListMailAccounts;
use Cyberfusion\CoreApi\Requests\MailAccounts\ReadMailAccount;
use Cyberfusion\CoreApi\Requests\MailAccounts\UpdateMailAccount;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class MailAccounts extends CoreApiResource
{
    public function createMailAccount(MailAccountCreateRequest $mailAccountCreateRequest): Response
    {
        return $this->connector->send(new CreateMailAccount($mailAccountCreateRequest));
    }

    public function listMailAccounts(
        ?MailAccountsSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListMailAccounts($includeFilters, $includes));
    }

    public function readMailAccount(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadMailAccount($id, $includes));
    }

    public function updateMailAccount(int $id, MailAccountUpdateRequest $mailAccountUpdateRequest): Response
    {
        return $this->connector->send(new UpdateMailAccount($id, $mailAccountUpdateRequest));
    }

    public function deleteMailAccount(int $id, ?bool $deleteOnCluster = null): Response
    {
        return $this->connector->send(new DeleteMailAccount($id, $deleteOnCluster));
    }

    public function listMailAccountUsages(
        int $mailAccountId,
        string $timestamp,
        ?TimeUnitEnum $timeUnit = null,
    ): Response {
        return $this->connector->send(new ListMailAccountUsages($mailAccountId, $timestamp, $timeUnit));
    }
}
