<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BorgRepositoryUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getKeepHourly(): int|null
    {
        return $this->getAttribute('keepHourly');
    }

    public function setKeepHourly(?int $keepHourly): self
    {
        $this->setAttribute('keepHourly', $keepHourly);
        return $this;
    }

    public function getKeepDaily(): int|null
    {
        return $this->getAttribute('keepDaily');
    }

    public function setKeepDaily(?int $keepDaily): self
    {
        $this->setAttribute('keepDaily', $keepDaily);
        return $this;
    }

    public function getKeepWeekly(): int|null
    {
        return $this->getAttribute('keepWeekly');
    }

    public function setKeepWeekly(?int $keepWeekly): self
    {
        $this->setAttribute('keepWeekly', $keepWeekly);
        return $this;
    }

    public function getKeepMonthly(): int|null
    {
        return $this->getAttribute('keepMonthly');
    }

    public function setKeepMonthly(?int $keepMonthly): self
    {
        $this->setAttribute('keepMonthly', $keepMonthly);
        return $this;
    }

    public function getKeepYearly(): int|null
    {
        return $this->getAttribute('keepYearly');
    }

    public function setKeepYearly(?int $keepYearly): self
    {
        $this->setAttribute('keepYearly', $keepYearly);
        return $this;
    }

    public function getIdentityFilePath(): string|null
    {
        return $this->getAttribute('identityFilePath');
    }

    public function setIdentityFilePath(?string $identityFilePath): self
    {
        $this->setAttribute('identityFilePath', $identityFilePath);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setKeepHourly(Arr::get($data, 'keep_hourly'))
            ->setKeepDaily(Arr::get($data, 'keep_daily'))
            ->setKeepWeekly(Arr::get($data, 'keep_weekly'))
            ->setKeepMonthly(Arr::get($data, 'keep_monthly'))
            ->setKeepYearly(Arr::get($data, 'keep_yearly'))
            ->setIdentityFilePath(Arr::get($data, 'identity_file_path'));
    }
}
