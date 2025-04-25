<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

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
            ->setOptimizingEnabled(Arr::get($data, 'optimizing_enabled'))
            ->setBackupsEnabled(Arr::get($data, 'backups_enabled'));
    }
}
