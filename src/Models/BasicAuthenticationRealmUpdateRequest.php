<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BasicAuthenticationRealmUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getName(): string|null
    {
        return $this->getAttribute('name');
    }

    public function setName(?string $name): self
    {
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getHtpasswdFileId(): int|null
    {
        return $this->getAttribute('htpasswd_file_id');
    }

    public function setHtpasswdFileId(?int $htpasswdFileId): self
    {
        $this->setAttribute('htpasswd_file_id', $htpasswdFileId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'name'), fn (self $model) => $model->setName(Arr::get($data, 'name')))
            ->when(Arr::has($data, 'htpasswd_file_id'), fn (self $model) => $model->setHtpasswdFileId(Arr::get($data, 'htpasswd_file_id')));
    }
}
