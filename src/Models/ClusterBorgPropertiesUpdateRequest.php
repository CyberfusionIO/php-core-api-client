<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterBorgPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

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
            ->setAutomaticBorgRepositoriesPruneEnabled(Arr::get($data, 'automatic_borg_repositories_prune_enabled'));
    }
}
