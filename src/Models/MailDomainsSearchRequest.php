<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailDomainsSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getDomain(): string|null
    {
        return $this->getAttribute('domain');
    }

    public function setDomain(?string $domain): self
    {
        $this->setAttribute('domain', $domain);
        return $this;
    }

    public function getUnixUserId(): int|null
    {
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(?int $unixUserId): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getCatchAllForwardEmailAddresses(): string|null
    {
        return $this->getAttribute('catch_all_forward_email_addresses');
    }

    public function setCatchAllForwardEmailAddresses(?string $catchAllForwardEmailAddresses): self
    {
        $this->setAttribute('catch_all_forward_email_addresses', $catchAllForwardEmailAddresses);
        return $this;
    }

    public function getIsLocal(): bool|null
    {
        return $this->getAttribute('is_local');
    }

    public function setIsLocal(?bool $isLocal): self
    {
        $this->setAttribute('is_local', $isLocal);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'domain'), fn (self $model) => $model->setDomain(Arr::get($data, 'domain')))
            ->when(Arr::has($data, 'unix_user_id'), fn (self $model) => $model->setUnixUserId(Arr::get($data, 'unix_user_id')))
            ->when(Arr::has($data, 'catch_all_forward_email_addresses'), fn (self $model) => $model->setCatchAllForwardEmailAddresses(Arr::get($data, 'catch_all_forward_email_addresses')))
            ->when(Arr::has($data, 'is_local'), fn (self $model) => $model->setIsLocal(Arr::get($data, 'is_local')));
    }
}
