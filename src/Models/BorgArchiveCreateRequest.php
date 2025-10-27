<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BorgArchiveCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(int $borgRepositoryId, string $name)
    {
        $this->setBorgRepositoryId($borgRepositoryId);
        $this->setName($name);
    }

    public function getBorgRepositoryId(): int
    {
        return $this->getAttribute('borg_repository_id');
    }

    public function setBorgRepositoryId(int $borgRepositoryId): self
    {
        $this->setAttribute('borg_repository_id', $borgRepositoryId);
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
            ->regex('/^[a-zA-Z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            borgRepositoryId: Arr::get($data, 'borg_repository_id'),
            name: Arr::get($data, 'name'),
        ));
    }
}
