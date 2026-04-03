<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\Iso3166Alpha2CountryCodeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class RegionResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $name,
        Iso3166Alpha2CountryCodeEnum $iso3166Alpha2CountryCode,
        RegionIncludes $includes,
    ) {
        $this->setId($id);
        $this->setName($name);
        $this->setIso3166Alpha2CountryCode($iso3166Alpha2CountryCode);
        $this->setIncludes($includes);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(int $id): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(string $name): self
    {
        Validator::create()
            ->length(min: 1, max: 32)
            ->regex('/^[A-Z0-9-]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getIso3166Alpha2CountryCode(): Iso3166Alpha2CountryCodeEnum
    {
        return $this->getAttribute('iso_3166_alpha_2_country_code');
    }

    public function setIso3166Alpha2CountryCode(Iso3166Alpha2CountryCodeEnum $iso3166Alpha2CountryCode): self
    {
        $this->setAttribute('iso_3166_alpha_2_country_code', $iso3166Alpha2CountryCode);
        return $this;
    }

    public function getIncludes(): RegionIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(RegionIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            name: Arr::get($data, 'name'),
            iso3166Alpha2CountryCode: Iso3166Alpha2CountryCodeEnum::tryFrom(Arr::get($data, 'iso_3166_alpha_2_country_code')),
            includes: RegionIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
