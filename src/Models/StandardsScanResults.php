<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\StandardsScanCheckStatusEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class StandardsScanResults extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(StandardsScanCheckStatusEnum $checkStatus, array $domains)
    {
        $this->setCheckStatus($checkStatus);
        $this->setDomains($domains);
    }

    public function getCheckStatus(): StandardsScanCheckStatusEnum
    {
        return $this->getAttribute('check_status');
    }

    public function setCheckStatus(StandardsScanCheckStatusEnum $checkStatus): self
    {
        $this->setAttribute('check_status', $checkStatus);
        return $this;
    }

    public function getScores(): StandardsScanScores|null
    {
        return $this->getAttribute('scores');
    }

    public function setScores(?StandardsScanScores $scores): self
    {
        $this->setAttribute('scores', $scores);
        return $this;
    }

    public function getDomains(): array
    {
        return $this->getAttribute('domains');
    }

    public function setDomains(array $domains): self
    {
        $this->setAttribute('domains', $domains);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            checkStatus: StandardsScanCheckStatusEnum::tryFrom(Arr::get($data, 'check_status')),
            domains: Arr::get($data, 'domains'),
        ))
            ->when(Arr::has($data, 'scores'), fn (self $model) => $model->setScores(Arr::get($data, 'scores') !== null ? StandardsScanScores::fromArray(Arr::get($data, 'scores')) : null));
    }
}
