<?php

namespace Cyberfusion\CoreApi\Models;

use ArrayObject;
use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ValidationError extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(array $loc, string $msg, string $type)
    {
        $this->setLoc($loc);
        $this->setMsg($msg);
        $this->setType($type);
    }

    public function getLoc(): array
    {
        return $this->getAttribute('loc');
    }

    public function setLoc(array $loc): self
    {
        $this->setAttribute('loc', $loc);
        return $this;
    }

    public function getMsg(): string
    {
        return $this->getAttribute('msg');
    }

    public function setMsg(string $msg): self
    {
        $this->setAttribute('msg', $msg);
        return $this;
    }

    public function getType(): string
    {
        return $this->getAttribute('type');
    }

    public function setType(string $type): self
    {
        $this->setAttribute('type', $type);
        return $this;
    }

    public function getInput(): string
    {
        return $this->getAttribute('input');
    }

    public function setInput(string $input): self
    {
        $this->setAttribute('input', $input);
        return $this;
    }

    public function getCtx(): ArrayObject
    {
        return $this->getAttribute('ctx');
    }

    public function setCtx(ArrayObject $ctx): self
    {
        $this->setAttribute('ctx', $ctx);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            loc: Arr::get($data, 'loc'),
            msg: Arr::get($data, 'msg'),
            type: Arr::get($data, 'type'),
        ))
            ->when(Arr::has($data, 'input'), fn (self $model) => $model->setInput(Arr::get($data, 'input')))
            ->when(Arr::has($data, 'ctx'), fn (self $model) => $model->setCtx(new ArrayObject(Arr::get($data, 'ctx'))));
    }
}
