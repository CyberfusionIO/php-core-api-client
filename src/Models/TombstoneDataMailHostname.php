<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
class TombstoneDataMailHostname extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $id, string $domain, TombstoneDataMailHostnameIncludes $includes)
    {
        $this->setId($id);
        $this->setDomain($domain);
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

    public function getDomain(): string
    {
        return $this->getAttribute('domain');
    }

    public function setDomain(?string $domain = null): self
    {
        $this->setAttribute('domain', $domain);
        return $this;
    }

    public function getIncludes(): TombstoneDataMailHostnameIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?TombstoneDataMailHostnameIncludes $includes = null): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            domain: Arr::get($data, 'domain'),
            includes: TombstoneDataMailHostnameIncludes::fromArray(Arr::get($data, 'includes')),
        ))
            ->setDataType(Arr::get($data, 'data_type', 'mail_hostname'));
    }
}
