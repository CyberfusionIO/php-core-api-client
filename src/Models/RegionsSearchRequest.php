<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\Iso3166Alpha2CountryCodeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class RegionsSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getName(): string|null
    {
        return $this->getAttribute('name');
    }

    public function setName(?string $name): self
    {
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getIso3166Alpha2CountryCode(): Iso3166Alpha2CountryCodeEnum|null
    {
        return $this->getAttribute('iso_3166_alpha_2_country_code');
    }

    public function setIso3166Alpha2CountryCode(?Iso3166Alpha2CountryCodeEnum $iso3166Alpha2CountryCode): self
    {
        $this->setAttribute('iso_3166_alpha_2_country_code', $iso3166Alpha2CountryCode);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'name'), fn (self $model) => $model->setName(Arr::get($data, 'name')))
            ->when(Arr::has($data, 'iso_3166_alpha_2_country_code'), fn (self $model) => $model->setIso3166Alpha2CountryCode(Arr::get($data, 'iso_3166_alpha_2_country_code') !== null ? Iso3166Alpha2CountryCodeEnum::tryFrom(Arr::get($data, 'iso_3166_alpha_2_country_code')) : null));
    }
}
