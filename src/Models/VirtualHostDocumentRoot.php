<?php

namespace Cyberfusion\CoreApi\Models;

use ArrayObject;
use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class VirtualHostDocumentRoot extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(ArrayObject $containsFiles)
    {
        $this->setContainsFiles($containsFiles);
    }

    public function getContainsFiles(): ArrayObject
    {
        return $this->getAttribute('contains_files');
    }

    public function setContainsFiles(?ArrayObject $containsFiles = null): self
    {
        $this->setAttribute('contains_files', $containsFiles);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            containsFiles: new ArrayObject(Arr::get($data, 'contains_files')),
        ));
    }
}
