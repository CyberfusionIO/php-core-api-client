<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BorgArchiveMetadata extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $name, int $borgArchiveId, bool $existsOnServer, ?string $contentsPath = null)
    {
        $this->setName($name);
        $this->setBorgArchiveId($borgArchiveId);
        $this->setExistsOnServer($existsOnServer);
        $this->setContentsPath($contentsPath);
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

    public function getBorgArchiveId(): int
    {
        return $this->getAttribute('borg_archive_id');
    }

    public function setBorgArchiveId(int $borgArchiveId): self
    {
        $this->setAttribute('borg_archive_id', $borgArchiveId);
        return $this;
    }

    public function getExistsOnServer(): bool
    {
        return $this->getAttribute('exists_on_server');
    }

    public function setExistsOnServer(bool $existsOnServer): self
    {
        $this->setAttribute('exists_on_server', $existsOnServer);
        return $this;
    }

    public function getContentsPath(): string|null
    {
        return $this->getAttribute('contents_path');
    }

    public function setContentsPath(?string $contentsPath): self
    {
        $this->setAttribute('contents_path', $contentsPath);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            borgArchiveId: Arr::get($data, 'borg_archive_id'),
            existsOnServer: Arr::get($data, 'exists_on_server'),
            contentsPath: Arr::get($data, 'contents_path'),
        ));
    }
}
