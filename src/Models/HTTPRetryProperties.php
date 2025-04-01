<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Automatically retry failed HTTP requests.
 */
class HTTPRetryProperties extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(?int $triesAmount = null, ?int $triesFailoverAmount = null, ?array $conditions = null)
    {
        $this->setTriesAmount($triesAmount);
        $this->setTriesFailoverAmount($triesFailoverAmount);
        $this->setConditions($conditions);
    }

    public function getTriesAmount(): int|null
    {
        return $this->getAttribute('triesAmount');
    }

    public function setTriesAmount(?int $triesAmount = null): self
    {
        $this->setAttribute('triesAmount', $triesAmount);
        return $this;
    }

    public function getTriesFailoverAmount(): int|null
    {
        return $this->getAttribute('triesFailoverAmount');
    }

    public function setTriesFailoverAmount(?int $triesFailoverAmount = null): self
    {
        $this->setAttribute('triesFailoverAmount', $triesFailoverAmount);
        return $this;
    }

    public function getConditions(): array|null
    {
        return $this->getAttribute('conditions');
    }

    /**
     * @throws ValidationException
     */
    public function setConditions(?array $conditions = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($conditions));
        $this->setAttribute('conditions', $conditions);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            triesAmount: Arr::get($data, 'tries_amount'),
            triesFailoverAmount: Arr::get($data, 'tries_failover_amount'),
            conditions: Arr::get($data, 'conditions'),
        ));
    }
}
