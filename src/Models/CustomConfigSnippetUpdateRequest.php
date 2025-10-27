<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CustomConfigSnippetUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getContents(): string|null
    {
        return $this->getAttribute('contents');
    }

    public function setContents(?string $contents): self
    {
        $this->setAttribute('contents', $contents);
        return $this;
    }

    public function getIsDefault(): bool|null
    {
        return $this->getAttribute('is_default');
    }

    public function setIsDefault(?bool $isDefault): self
    {
        $this->setAttribute('is_default', $isDefault);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'contents'), fn (self $model) => $model->setContents(Arr::get($data, 'contents')))
            ->when(Arr::has($data, 'is_default'), fn (self $model) => $model->setIsDefault(Arr::get($data, 'is_default')));
    }
}
