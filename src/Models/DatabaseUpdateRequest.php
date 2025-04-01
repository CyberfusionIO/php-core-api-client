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

    public function getOptimizingEnabled(): bool
    {
        return $this->getAttribute('optimizingEnabled');
    }

    public function setOptimizingEnabled(bool $optimizingEnabled): self
    {
        $this->setAttribute('optimizingEnabled', $optimizingEnabled);
        return $this;
    }

    public function getBackupsEnabled(): bool
    {
        return $this->getAttribute('backupsEnabled');
    }

    public function setBackupsEnabled(bool $backupsEnabled): self
    {
        $this->setAttribute('backupsEnabled', $backupsEnabled);
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
