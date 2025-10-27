<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\MeilisearchEnvironmentEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterMeilisearchPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getMeilisearchBackupLocalRetention(): int|null
    {
        return $this->getAttribute('meilisearch_backup_local_retention');
    }

    public function setMeilisearchBackupLocalRetention(?int $meilisearchBackupLocalRetention): self
    {
        $this->setAttribute('meilisearch_backup_local_retention', $meilisearchBackupLocalRetention);
        return $this;
    }

    public function getMeilisearchMasterKey(): string|null
    {
        return $this->getAttribute('meilisearch_master_key');
    }

    public function setMeilisearchMasterKey(?string $meilisearchMasterKey): self
    {
        $this->setAttribute('meilisearch_master_key', $meilisearchMasterKey);
        return $this;
    }

    public function getMeilisearchEnvironment(): MeilisearchEnvironmentEnum|null
    {
        return $this->getAttribute('meilisearch_environment');
    }

    public function setMeilisearchEnvironment(?MeilisearchEnvironmentEnum $meilisearchEnvironment): self
    {
        $this->setAttribute('meilisearch_environment', $meilisearchEnvironment);
        return $this;
    }

    public function getMeilisearchBackupInterval(): int|null
    {
        return $this->getAttribute('meilisearch_backup_interval');
    }

    public function setMeilisearchBackupInterval(?int $meilisearchBackupInterval): self
    {
        $this->setAttribute('meilisearch_backup_interval', $meilisearchBackupInterval);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'meilisearch_backup_local_retention'), fn (self $model) => $model->setMeilisearchBackupLocalRetention(Arr::get($data, 'meilisearch_backup_local_retention')))
            ->when(Arr::has($data, 'meilisearch_master_key'), fn (self $model) => $model->setMeilisearchMasterKey(Arr::get($data, 'meilisearch_master_key')))
            ->when(Arr::has($data, 'meilisearch_environment'), fn (self $model) => $model->setMeilisearchEnvironment(Arr::get($data, 'meilisearch_environment') !== null ? MeilisearchEnvironmentEnum::tryFrom(Arr::get($data, 'meilisearch_environment')) : null))
            ->when(Arr::has($data, 'meilisearch_backup_interval'), fn (self $model) => $model->setMeilisearchBackupInterval(Arr::get($data, 'meilisearch_backup_interval')));
    }
}
