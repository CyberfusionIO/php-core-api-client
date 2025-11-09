<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BorgRepositoryResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $name,
        int $unixId,
        int $clusterId,
        BorgRepositoryIncludes $includes,
        ?int $keepHourly = null,
        ?int $keepDaily = null,
        ?int $keepWeekly = null,
        ?int $keepMonthly = null,
        ?int $keepYearly = null,
        ?int $unixUserId = null,
        ?int $databaseId = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setName($name);
        $this->setUnixId($unixId);
        $this->setClusterId($clusterId);
        $this->setIncludes($includes);
        $this->setKeepHourly($keepHourly);
        $this->setKeepDaily($keepDaily);
        $this->setKeepWeekly($keepWeekly);
        $this->setKeepMonthly($keepMonthly);
        $this->setKeepYearly($keepYearly);
        $this->setUnixUserId($unixUserId);
        $this->setDatabaseId($databaseId);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(int $id): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(string $name): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getUnixId(): int
    {
        return $this->getAttribute('unix_id');
    }

    public function setUnixId(int $unixId): self
    {
        $this->setAttribute('unix_id', $unixId);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getKeepHourly(): int|null
    {
        return $this->getAttribute('keep_hourly');
    }

    public function setKeepHourly(?int $keepHourly): self
    {
        $this->setAttribute('keep_hourly', $keepHourly);
        return $this;
    }

    public function getKeepDaily(): int|null
    {
        return $this->getAttribute('keep_daily');
    }

    public function setKeepDaily(?int $keepDaily): self
    {
        $this->setAttribute('keep_daily', $keepDaily);
        return $this;
    }

    public function getKeepWeekly(): int|null
    {
        return $this->getAttribute('keep_weekly');
    }

    public function setKeepWeekly(?int $keepWeekly): self
    {
        $this->setAttribute('keep_weekly', $keepWeekly);
        return $this;
    }

    public function getKeepMonthly(): int|null
    {
        return $this->getAttribute('keep_monthly');
    }

    public function setKeepMonthly(?int $keepMonthly): self
    {
        $this->setAttribute('keep_monthly', $keepMonthly);
        return $this;
    }

    public function getKeepYearly(): int|null
    {
        return $this->getAttribute('keep_yearly');
    }

    public function setKeepYearly(?int $keepYearly): self
    {
        $this->setAttribute('keep_yearly', $keepYearly);
        return $this;
    }

    public function getUnixUserId(): int|null
    {
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(?int $unixUserId): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getDatabaseId(): int|null
    {
        return $this->getAttribute('database_id');
    }

    public function setDatabaseId(?int $databaseId): self
    {
        $this->setAttribute('database_id', $databaseId);
        return $this;
    }

    public function getIncludes(): BorgRepositoryIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(BorgRepositoryIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            name: Arr::get($data, 'name'),
            unixId: Arr::get($data, 'unix_id'),
            clusterId: Arr::get($data, 'cluster_id'),
            includes: BorgRepositoryIncludes::fromArray(Arr::get($data, 'includes')),
            keepHourly: Arr::get($data, 'keep_hourly'),
            keepDaily: Arr::get($data, 'keep_daily'),
            keepWeekly: Arr::get($data, 'keep_weekly'),
            keepMonthly: Arr::get($data, 'keep_monthly'),
            keepYearly: Arr::get($data, 'keep_yearly'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            databaseId: Arr::get($data, 'database_id'),
        ));
    }
}
