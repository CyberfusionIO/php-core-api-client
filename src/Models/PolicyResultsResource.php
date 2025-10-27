<?php

namespace Cyberfusion\CoreApi\Models;

use ArrayObject;
use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Model outlining why access was denied based on policies the request passed through.
 *
 * Returned when a request was denied because access to specific object(s) was denied.
 */
class PolicyResultsResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $summary, ArrayObject $results)
    {
        $this->setSummary($summary);
        $this->setResults($results);
    }

    public function getSummary(): string
    {
        return $this->getAttribute('summary');
    }

    public function setSummary(string $summary): self
    {
        $this->setAttribute('summary', $summary);
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
            summary: Arr::get($data, 'summary'),
            results: new ArrayObject(Arr::get($data, 'results')),
        ));
    }
}
