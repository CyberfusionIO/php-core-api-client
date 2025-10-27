<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CompositeSpecificationsUnsatisfiedError extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(array $results)
    {
        $this->setResults($results);
    }

    public function getResults(): array
    {
        return $this->getAttribute('results');
    }

    public function setResults(array $results): self
    {
        $this->setAttribute('results', $results);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            results: Arr::get($data, 'results'),
        ));
    }
}
