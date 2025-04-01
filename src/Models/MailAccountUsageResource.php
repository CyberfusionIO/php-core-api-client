<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailAccountUsageResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $mailAccountId, string $usage, string $timestamp)
    {
        $this->setMailAccountId($mailAccountId);
        $this->setUsage($usage);
        $this->setTimestamp($timestamp);
    }

    public function getMailAccountId(): int
    {
        return $this->getAttribute('mailAccountId');
    }

    public function setMailAccountId(?int $mailAccountId = null): self
    {
        $this->setAttribute('mailAccountId', $mailAccountId);
        return $this;
    }

    public function getUsage(): string
    {
        return $this->getAttribute('usage');
    }

    public function setUsage(?string $usage = null): self
    {
        $this->setAttribute('usage', $usage);
        return $this;
    }

    public function getTimestamp(): string
    {
        return $this->getAttribute('timestamp');
    }

    public function setTimestamp(?string $timestamp = null): self
    {
        $this->setAttribute('timestamp', $timestamp);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            mailAccountId: Arr::get($data, 'mail_account_id'),
            usage: Arr::get($data, 'usage'),
            timestamp: Arr::get($data, 'timestamp'),
        ));
    }
}
