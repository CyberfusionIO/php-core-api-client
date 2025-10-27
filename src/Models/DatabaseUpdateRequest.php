<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getOptimizingEnabled(): bool|null
    {
        return $this->getAttribute('optimizing_enabled');
    }

    public function setOptimizingEnabled(?bool $optimizingEnabled): self
    {
        $this->setAttribute('optimizing_enabled', $optimizingEnabled);
        return $this;
    }

    public function getBackupsEnabled(): bool|null
    {
        return $this->getAttribute('backups_enabled');
    }

    public function setBackupsEnabled(?bool $backupsEnabled): self
    {
        $this->setAttribute('backups_enabled', $backupsEnabled);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'optimizing_enabled'), fn (self $model) => $model->setOptimizingEnabled(Arr::get($data, 'optimizing_enabled')))
            ->when(Arr::has($data, 'backups_enabled'), fn (self $model) => $model->setBackupsEnabled(Arr::get($data, 'backups_enabled')));
    }
}
