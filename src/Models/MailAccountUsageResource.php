<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailAccountUsageResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $mailAccountId,
        float $usage,
        string $timestamp,
        MailAccountUsageIncludes $includes,
    ) {
        $this->setMailAccountId($mailAccountId);
        $this->setUsage($usage);
        $this->setTimestamp($timestamp);
        $this->setIncludes($includes);
    }

    public function getMailAccountId(): int
    {
        return $this->getAttribute('mail_account_id');
    }

    public function setMailAccountId(int $mailAccountId): self
    {
        $this->setAttribute('mail_account_id', $mailAccountId);
        return $this;
    }

    public function getUsage(): float
    {
        return $this->getAttribute('usage');
    }

    public function setUsage(float $usage): self
    {
        $this->setAttribute('usage', $usage);
        return $this;
    }

    public function getTimestamp(): string
    {
        return $this->getAttribute('timestamp');
    }

    public function setTimestamp(string $timestamp): self
    {
        $this->setAttribute('timestamp', $timestamp);
        return $this;
    }

    public function getIncludes(): MailAccountUsageIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(MailAccountUsageIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            mailAccountId: Arr::get($data, 'mail_account_id'),
            usage: Arr::get($data, 'usage'),
            timestamp: Arr::get($data, 'timestamp'),
            includes: MailAccountUsageIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
