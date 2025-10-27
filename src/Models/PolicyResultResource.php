<?php

namespace Cyberfusion\CoreApi\Models;

use ArrayObject;
use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class PolicyResultResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(bool $satisfied, ArrayObject $results, ?int $objectId = null)
    {
        $this->setSatisfied($satisfied);
        $this->setResults($results);
        $this->setObjectId($objectId);
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

    public function getObjectId(): int|null
    {
        return $this->getAttribute('object_id');
    }

    public function setObjectId(?int $objectId): self
    {
        $this->setAttribute('object_id', $objectId);
        return $this;
    }

    public function getResults(): ArrayObject
    {
        return $this->getAttribute('results');
    }

    public function setResults(ArrayObject $results): self
    {
        $this->setAttribute('results', $results);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            satisfied: Arr::get($data, 'satisfied'),
            results: new ArrayObject(Arr::get($data, 'results')),
            objectId: Arr::get($data, 'object_id'),
        ));
    }
}
