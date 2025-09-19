<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataCertificate extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $id, TombstoneDataCertificateIncludes $includes)
    {
        $this->setId($id);
        $this->setIncludes($includes);
    }

    public function getDataType(): string
    {
        return $this->getAttribute('data_type');
    }

    public function setDataType(string $dataType): self
    {
        $this->setAttribute('data_type', $dataType);
        return $this;
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(?int $id = null): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getIncludes(): TombstoneDataCertificateIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?TombstoneDataCertificateIncludes $includes = null): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            includes: TombstoneDataCertificateIncludes::fromArray(Arr::get($data, 'includes')),
        ))
            ->setDataType(Arr::get($data, 'data_type', 'certificate'));
    }
}
