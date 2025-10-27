<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataUNIXUser extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $homeDirectory,
        TombstoneDataUNIXUserIncludes $includes,
        ?string $mailDomainsDirectory = null,
    ) {
        $this->setId($id);
        $this->setHomeDirectory($homeDirectory);
        $this->setIncludes($includes);
        $this->setMailDomainsDirectory($mailDomainsDirectory);
    }

    public function getDataType(): string
    {
        return $this->getAttribute('data_type');
    }

    public function setDataType(string $dataType): self
    {
        $this->setAttribute('data_type', $dataType);
        return $this;
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

    public function getHomeDirectory(): string
    {
        return $this->getAttribute('home_directory');
    }

    public function setHomeDirectory(string $homeDirectory): self
    {
        $this->setAttribute('home_directory', $homeDirectory);
        return $this;
    }

    public function getMailDomainsDirectory(): string|null
    {
        return $this->getAttribute('mail_domains_directory');
    }

    public function setMailDomainsDirectory(?string $mailDomainsDirectory): self
    {
        $this->setAttribute('mail_domains_directory', $mailDomainsDirectory);
        return $this;
    }

    public function getDeleteOnCluster(): bool
    {
        return $this->getAttribute('delete_on_cluster');
    }

    public function setDeleteOnCluster(bool $deleteOnCluster): self
    {
        $this->setAttribute('delete_on_cluster', $deleteOnCluster);
        return $this;
    }

    public function getIncludes(): TombstoneDataUNIXUserIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(TombstoneDataUNIXUserIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            homeDirectory: Arr::get($data, 'home_directory'),
            includes: TombstoneDataUNIXUserIncludes::fromArray(Arr::get($data, 'includes')),
            mailDomainsDirectory: Arr::get($data, 'mail_domains_directory'),
        ))
            ->when(Arr::has($data, 'data_type'), fn (self $model) => $model->setDataType(Arr::get($data, 'data_type', 'unix_user')))
            ->when(Arr::has($data, 'delete_on_cluster'), fn (self $model) => $model->setDeleteOnCluster(Arr::get($data, 'delete_on_cluster', false)));
    }
}
