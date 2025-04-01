<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ValidationError extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $msg, string $type, ?array $loc = null)
    {
        $this->setMsg($msg);
        $this->setType($type);
        $this->setLoc($loc);
    }

    public function getLoc(): array|null
    {
        return $this->getAttribute('loc');
    }

    public function setLoc(?array $loc = []): self
    {
        $this->setAttribute('loc', $loc);
        return $this;
    }

    public function getMsg(): string
    {
        return $this->getAttribute('msg');
    }

    public function setMsg(?string $msg = null): self
    {
        $this->setAttribute('msg', $msg);
        return $this;
    }

    public function getType(): string
    {
        return $this->getAttribute('type');
    }

    public function setType(?string $type = null): self
    {
        $this->setAttribute('type', $type);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            msg: Arr::get($data, 'msg'),
            type: Arr::get($data, 'type'),
            loc: Arr::get($data, 'loc'),
        ));
    }
}
