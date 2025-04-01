<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\HealthStatusEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HealthResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(HealthStatusEnum $status)
    {
        $this->setStatus($status);
    }

    public function getStatus(): HealthStatusEnum
    {
        return $this->getAttribute('status');
    }

    public function setStatus(?HealthStatusEnum $status = null): self
    {
        $this->setAttribute('status', $status);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            status: HealthStatusEnum::tryFrom(Arr::get($data, 'status')),
        ));
    }
}
