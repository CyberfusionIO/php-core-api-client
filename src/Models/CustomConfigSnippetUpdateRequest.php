<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CustomConfigSnippetUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

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
            ->setContents(Arr::get($data, 'contents'))
            ->setIsDefault(Arr::get($data, 'is_default'));
    }
}
