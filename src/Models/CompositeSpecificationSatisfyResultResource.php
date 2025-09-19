<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\SpecificationModeEnum;
use Cyberfusion\CoreApi\Enums\SpecificationNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CompositeSpecificationSatisfyResultResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        SpecificationNameEnum $name,
        bool $satisfied,
        array $results,
        SpecificationModeEnum $mode,
    ) {
        $this->setName($name);
        $this->setSatisfied($satisfied);
        $this->setResults($results);
        $this->setMode($mode);
    }

    public function getName(): SpecificationNameEnum
    {
        return $this->getAttribute('name');
    }

    public function setName(?SpecificationNameEnum $name = null): self
    {
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getSatisfied(): bool
    {
        return $this->getAttribute('satisfied');
    }

    public function setSatisfied(?bool $satisfied = null): self
    {
        $this->setAttribute('satisfied', $satisfied);
        return $this;
    }

    public function getResults(): array
    {
        return $this->getAttribute('results');
    }

    public function setResults(array $results = []): self
    {
        $this->setAttribute('results', $results);
        return $this;
    }

    public function getMode(): SpecificationModeEnum
    {
        return $this->getAttribute('mode');
    }

    public function setMode(?SpecificationModeEnum $mode = null): self
    {
        $this->setAttribute('mode', $mode);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            name: SpecificationNameEnum::tryFrom(Arr::get($data, 'name')),
            satisfied: Arr::get($data, 'satisfied'),
            results: Arr::get($data, 'results'),
            mode: SpecificationModeEnum::tryFrom(Arr::get($data, 'mode')),
        ));
    }
}
