<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterBorgPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getAutomaticBorgRepositoriesPruneEnabled(): bool|null
    {
        return $this->getAttribute('automatic_borg_repositories_prune_enabled');
    }

    public function setAutomaticBorgRepositoriesPruneEnabled(?bool $automaticBorgRepositoriesPruneEnabled): self
    {
        $this->setAttribute('automatic_borg_repositories_prune_enabled', $automaticBorgRepositoriesPruneEnabled);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'automatic_borg_repositories_prune_enabled'), fn (self $model) => $model->setAutomaticBorgRepositoriesPruneEnabled(Arr::get($data, 'automatic_borg_repositories_prune_enabled')));
    }
}
