<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\CMSSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CMSCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(CMSSoftwareNameEnum $softwareName, bool $isManuallyCreated, int $virtualHostId)
    {
        $this->setSoftwareName($softwareName);
        $this->setIsManuallyCreated($isManuallyCreated);
        $this->setVirtualHostId($virtualHostId);
    }

    public function getSoftwareName(): CMSSoftwareNameEnum
    {
        return $this->getAttribute('software_name');
    }

    public function setSoftwareName(CMSSoftwareNameEnum $softwareName): self
    {
        $this->setAttribute('software_name', $softwareName);
        return $this;
    }

    public function getIsManuallyCreated(): bool
    {
        return $this->getAttribute('is_manually_created');
    }

    public function setIsManuallyCreated(bool $isManuallyCreated): self
    {
        $this->setAttribute('is_manually_created', $isManuallyCreated);
        return $this;
    }

    public function getVirtualHostId(): int
    {
        return $this->getAttribute('virtual_host_id');
    }

    public function setVirtualHostId(int $virtualHostId): self
    {
        $this->setAttribute('virtual_host_id', $virtualHostId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            softwareName: CMSSoftwareNameEnum::tryFrom(Arr::get($data, 'software_name')),
            isManuallyCreated: Arr::get($data, 'is_manually_created'),
            virtualHostId: Arr::get($data, 'virtual_host_id'),
        ));
    }
}
