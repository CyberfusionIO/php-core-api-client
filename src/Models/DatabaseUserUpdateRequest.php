<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseUserUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getPhpmyadminFirewallGroupsIds(): array|null
    {
        return $this->getAttribute('phpmyadminFirewallGroupsIds');
    }

    public function setPhpmyadminFirewallGroupsIds(?array $phpmyadminFirewallGroupsIds): self
    {
        $this->setAttribute('phpmyadminFirewallGroupsIds', $phpmyadminFirewallGroupsIds);
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
            ->setPhpmyadminFirewallGroupsIds(Arr::get($data, 'phpmyadmin_firewall_groups_ids'))
            ->setPassword(Arr::get($data, 'password'));
    }
}
