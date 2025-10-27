<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\MeilisearchEnvironmentEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterMeilisearchPropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $meilisearchMasterKey, MeilisearchEnvironmentEnum $meilisearchEnvironment)
    {
        $this->setMeilisearchMasterKey($meilisearchMasterKey);
        $this->setMeilisearchEnvironment($meilisearchEnvironment);
    }

    public function getMeilisearchBackupLocalRetention(): int
    {
        return $this->getAttribute('meilisearch_backup_local_retention');
    }

    public function setMeilisearchBackupLocalRetention(int $meilisearchBackupLocalRetention): self
    {
        $this->setAttribute('meilisearch_backup_local_retention', $meilisearchBackupLocalRetention);
        return $this;
    }

    public function getMeilisearchMasterKey(): string
    {
        return $this->getAttribute('meilisearch_master_key');
    }

    /**
     * @throws ValidationException
     */
    public function setMeilisearchMasterKey(string $meilisearchMasterKey): self
    {
        Validator::create()
            ->length(min: 16, max: 24)
            ->regex('/^[a-zA-Z0-9]+$/')
            ->assert($meilisearchMasterKey);
        $this->setAttribute('meilisearch_master_key', $meilisearchMasterKey);
        return $this;
    }

    public function getMeilisearchEnvironment(): MeilisearchEnvironmentEnum
    {
        return $this->getAttribute('meilisearch_environment');
    }

    public function setMeilisearchEnvironment(MeilisearchEnvironmentEnum $meilisearchEnvironment): self
    {
        $this->setAttribute('meilisearch_environment', $meilisearchEnvironment);
        return $this;
    }

    public function getMeilisearchBackupInterval(): int
    {
        return $this->getAttribute('meilisearch_backup_interval');
    }

    public function setMeilisearchBackupInterval(int $meilisearchBackupInterval): self
    {
        $this->setAttribute('meilisearch_backup_interval', $meilisearchBackupInterval);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            meilisearchMasterKey: Arr::get($data, 'meilisearch_master_key'),
            meilisearchEnvironment: MeilisearchEnvironmentEnum::tryFrom(Arr::get($data, 'meilisearch_environment')),
        ))
            ->when(Arr::has($data, 'meilisearch_backup_local_retention'), fn (self $model) => $model->setMeilisearchBackupLocalRetention(Arr::get($data, 'meilisearch_backup_local_retention', 3)))
            ->when(Arr::has($data, 'meilisearch_backup_interval'), fn (self $model) => $model->setMeilisearchBackupInterval(Arr::get($data, 'meilisearch_backup_interval', 24)));
    }
}
