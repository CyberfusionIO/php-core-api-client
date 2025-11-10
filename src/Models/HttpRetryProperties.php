<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Automatically retry failed HTTP requests.
 */
class HttpRetryProperties extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(array $conditions, ?int $triesAmount = null, ?int $triesFailoverAmount = null)
    {
        $this->setConditions($conditions);
        $this->setTriesAmount($triesAmount);
        $this->setTriesFailoverAmount($triesFailoverAmount);
    }

    public function getTriesAmount(): int|null
    {
        return $this->getAttribute('tries_amount');
    }

    public function setTriesAmount(?int $triesAmount): self
    {
        $this->setAttribute('tries_amount', $triesAmount);
        return $this;
    }

    public function getTriesFailoverAmount(): int|null
    {
        return $this->getAttribute('tries_failover_amount');
    }

    public function setTriesFailoverAmount(?int $triesFailoverAmount): self
    {
        $this->setAttribute('tries_failover_amount', $triesFailoverAmount);
        return $this;
    }

    public function getConditions(): array
    {
        return $this->getAttribute('conditions');
    }

    /**
     * @throws ValidationException
     */
    public function setConditions(array $conditions): self
    {
        Validator::create()
            ->unique()
            ->assert($conditions);
        $this->setAttribute('conditions', $conditions);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            conditions: Arr::get($data, 'conditions'),
            triesAmount: Arr::get($data, 'tries_amount'),
            triesFailoverAmount: Arr::get($data, 'tries_failover_amount'),
        ));
    }
}
