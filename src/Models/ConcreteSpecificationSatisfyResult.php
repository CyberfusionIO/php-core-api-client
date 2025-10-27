<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ConcreteSpecificationSatisfyResult extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(bool $satisfied, string $requirement)
    {
        $this->setSatisfied($satisfied);
        $this->setRequirement($requirement);
    }

    public function getSatisfied(): bool
    {
        return $this->getAttribute('satisfied');
    }

    public function setSatisfied(bool $satisfied): self
    {
        $this->setAttribute('satisfied', $satisfied);
        return $this;
    }

    public function getRequirement(): string
    {
        return $this->getAttribute('requirement');
    }

    public function setRequirement(string $requirement): self
    {
        $this->setAttribute('requirement', $requirement);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            satisfied: Arr::get($data, 'satisfied'),
            requirement: Arr::get($data, 'requirement'),
        ));
    }
}
