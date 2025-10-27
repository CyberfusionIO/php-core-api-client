<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BorgRepositoryUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getKeepHourly(): int|null
    {
        return $this->getAttribute('keep_hourly');
    }

    public function setKeepHourly(?int $keepHourly): self
    {
        $this->setAttribute('keep_hourly', $keepHourly);
        return $this;
    }

    public function getKeepDaily(): int|null
    {
        return $this->getAttribute('keep_daily');
    }

    public function setKeepDaily(?int $keepDaily): self
    {
        $this->setAttribute('keep_daily', $keepDaily);
        return $this;
    }

    public function getKeepWeekly(): int|null
    {
        return $this->getAttribute('keep_weekly');
    }

    public function setKeepWeekly(?int $keepWeekly): self
    {
        $this->setAttribute('keep_weekly', $keepWeekly);
        return $this;
    }

    public function getKeepMonthly(): int|null
    {
        return $this->getAttribute('keep_monthly');
    }

    public function setKeepMonthly(?int $keepMonthly): self
    {
        $this->setAttribute('keep_monthly', $keepMonthly);
        return $this;
    }

    public function getKeepYearly(): int|null
    {
        return $this->getAttribute('keep_yearly');
    }

    public function setKeepYearly(?int $keepYearly): self
    {
        $this->setAttribute('keep_yearly', $keepYearly);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'keep_hourly'), fn (self $model) => $model->setKeepHourly(Arr::get($data, 'keep_hourly')))
            ->when(Arr::has($data, 'keep_daily'), fn (self $model) => $model->setKeepDaily(Arr::get($data, 'keep_daily')))
            ->when(Arr::has($data, 'keep_weekly'), fn (self $model) => $model->setKeepWeekly(Arr::get($data, 'keep_weekly')))
            ->when(Arr::has($data, 'keep_monthly'), fn (self $model) => $model->setKeepMonthly(Arr::get($data, 'keep_monthly')))
            ->when(Arr::has($data, 'keep_yearly'), fn (self $model) => $model->setKeepYearly(Arr::get($data, 'keep_yearly')));
    }
}
