<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class VirtualHostDocumentRoot extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $containsFiles)
    {
        $this->setContainsFiles($containsFiles);
    }

    public function getContainsFiles(): string
    {
        return $this->getAttribute('containsFiles');
    }

    public function setContainsFiles(?string $containsFiles = null): self
    {
        $this->setAttribute('contains_files', $containsFiles);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            containsFiles: Arr::get($data, 'contains_files'),
        ));
    }
}
