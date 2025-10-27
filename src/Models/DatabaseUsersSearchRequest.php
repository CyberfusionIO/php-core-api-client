<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseUsersSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getPhpmyadminFirewallGroupsIds(): int|null
    {
        return $this->getAttribute('phpmyadmin_firewall_groups_ids');
    }

    public function setPhpmyadminFirewallGroupsIds(?int $phpmyadminFirewallGroupsIds): self
    {
        $this->setAttribute('phpmyadmin_firewall_groups_ids', $phpmyadminFirewallGroupsIds);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'phpmyadmin_firewall_groups_ids'), fn (self $model) => $model->setPhpmyadminFirewallGroupsIds(Arr::get($data, 'phpmyadmin_firewall_groups_ids')));
    }
}
