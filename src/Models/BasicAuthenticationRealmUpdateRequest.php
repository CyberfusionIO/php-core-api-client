<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BasicAuthenticationRealmUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
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
        Validator::optional(Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-zA-Z0-9-_ ]+$/'))
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getHtpasswdFileId(): int
    {
        return $this->getAttribute('htpasswdFileId');
    }

    public function setHtpasswdFileId(int $htpasswdFileId): self
    {
        $this->setAttribute('htpasswdFileId', $htpasswdFileId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setName(Arr::get($data, 'name'))
            ->setHtpasswdFileId(Arr::get($data, 'htpasswd_file_id'));
    }
}
