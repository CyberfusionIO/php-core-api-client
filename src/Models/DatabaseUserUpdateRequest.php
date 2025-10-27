<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseUserUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getPhpmyadminFirewallGroupsIds(): array|null
    {
        return $this->getAttribute('phpmyadmin_firewall_groups_ids');
    }

    public function setPhpmyadminFirewallGroupsIds(?array $phpmyadminFirewallGroupsIds): self
    {
        $this->setAttribute('phpmyadmin_firewall_groups_ids', $phpmyadminFirewallGroupsIds);
        return $this;
    }

    public function getPassword(): string|null
    {
        return $this->getAttribute('password');
    }

    public function setPassword(?string $password): self
    {
        $this->setAttribute('password', $password);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'phpmyadmin_firewall_groups_ids'), fn (self $model) => $model->setPhpmyadminFirewallGroupsIds(Arr::get($data, 'phpmyadmin_firewall_groups_ids')))
            ->when(Arr::has($data, 'password'), fn (self $model) => $model->setPassword(Arr::get($data, 'password')));
    }
}
