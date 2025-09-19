<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\MeilisearchEnvironmentEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterMeilisearchPropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
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
    public function setMeilisearchMasterKey(?string $meilisearchMasterKey = null): self
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

    public function setMeilisearchEnvironment(?MeilisearchEnvironmentEnum $meilisearchEnvironment = null): self
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
            ->setMeilisearchBackupLocalRetention(Arr::get($data, 'meilisearch_backup_local_retention', 3))
            ->setMeilisearchBackupInterval(Arr::get($data, 'meilisearch_backup_interval', 24));
    }
}
