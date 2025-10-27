<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CustomersSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getIdentifier(): string|null
    {
        return $this->getAttribute('identifier');
    }

    public function setIdentifier(?string $identifier): self
    {
        $this->setAttribute('identifier', $identifier);
        return $this;
    }

    public function getDnsSubdomain(): string|null
    {
        return $this->getAttribute('dns_subdomain');
    }

    public function setDnsSubdomain(?string $dnsSubdomain): self
    {
        $this->setAttribute('dns_subdomain', $dnsSubdomain);
        return $this;
    }

    public function getIsInternal(): bool|null
    {
        return $this->getAttribute('is_internal');
    }

    public function setIsInternal(?bool $isInternal): self
    {
        $this->setAttribute('is_internal', $isInternal);
        return $this;
    }

    public function getTeamCode(): string|null
    {
        return $this->getAttribute('team_code');
    }

    public function setTeamCode(?string $teamCode): self
    {
        $this->setAttribute('team_code', $teamCode);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'identifier'), fn (self $model) => $model->setIdentifier(Arr::get($data, 'identifier')))
            ->when(Arr::has($data, 'dns_subdomain'), fn (self $model) => $model->setDnsSubdomain(Arr::get($data, 'dns_subdomain')))
            ->when(Arr::has($data, 'is_internal'), fn (self $model) => $model->setIsInternal(Arr::get($data, 'is_internal')))
            ->when(Arr::has($data, 'team_code'), fn (self $model) => $model->setTeamCode(Arr::get($data, 'team_code')));
    }
}
