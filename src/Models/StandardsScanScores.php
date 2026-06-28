<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class StandardsScanScores extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(float $great, float $good, float $fine, float $bad)
    {
        $this->setGreat($great);
        $this->setGood($good);
        $this->setFine($fine);
        $this->setBad($bad);
    }

    public function getGreat(): float
    {
        return $this->getAttribute('great');
    }

    public function setGreat(float $great): self
    {
        $this->setAttribute('great', $great);
        return $this;
    }

    public function getGood(): float
    {
        return $this->getAttribute('good');
    }

    public function setGood(float $good): self
    {
        $this->setAttribute('good', $good);
        return $this;
    }

    public function getFine(): float
    {
        return $this->getAttribute('fine');
    }

    public function setFine(float $fine): self
    {
        $this->setAttribute('fine', $fine);
        return $this;
    }

    public function getBad(): float
    {
        return $this->getAttribute('bad');
    }

    public function setBad(float $bad): self
    {
        $this->setAttribute('bad', $bad);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            great: Arr::get($data, 'great'),
            good: Arr::get($data, 'good'),
            fine: Arr::get($data, 'fine'),
            bad: Arr::get($data, 'bad'),
        ));
    }
}
