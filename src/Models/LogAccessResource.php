<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\LogMethodEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class LogAccessResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $remoteAddress,
        string $rawMessage,
        string $timestamp,
        int $statusCode,
        int $bytesSent,
    ) {
        $this->setRemoteAddress($remoteAddress);
        $this->setRawMessage($rawMessage);
        $this->setTimestamp($timestamp);
        $this->setStatusCode($statusCode);
        $this->setBytesSent($bytesSent);
    }

    public function getRemoteAddress(): string
    {
        return $this->getAttribute('remoteAddress');
    }

    public function setRemoteAddress(?string $remoteAddress = null): self
    {
        $this->setAttribute('remote_address', $remoteAddress);
        return $this;
    }

    public function getRawMessage(): string
    {
        return $this->getAttribute('rawMessage');
    }

    /**
     * @throws ValidationException
     */
    public function setRawMessage(?string $rawMessage = null): self
    {
        Validator::create()
            ->length(min: 1, max: 65535)
            ->assert($rawMessage);
        $this->setAttribute('raw_message', $rawMessage);
        return $this;
    }

    public function getMethod(): LogMethodEnum|null
    {
        return $this->getAttribute('method');
    }

    public function setMethod(?LogMethodEnum $method): self
    {
        $this->setAttribute('method', $method);
        return $this;
    }

    public function getUri(): string|null
    {
        return $this->getAttribute('uri');
    }

    public function setUri(?string $uri): self
    {
        $this->setAttribute('uri', $uri);
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

    public function getStatusCode(): int
    {
        return $this->getAttribute('statusCode');
    }

    public function setStatusCode(?int $statusCode = null): self
    {
        $this->setAttribute('status_code', $statusCode);
        return $this;
    }

    public function getBytesSent(): int
    {
        return $this->getAttribute('bytesSent');
    }

    public function setBytesSent(?int $bytesSent = null): self
    {
        $this->setAttribute('bytes_sent', $bytesSent);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            remoteAddress: Arr::get($data, 'remote_address'),
            rawMessage: Arr::get($data, 'raw_message'),
            timestamp: Arr::get($data, 'timestamp'),
            statusCode: Arr::get($data, 'status_code'),
            bytesSent: Arr::get($data, 'bytes_sent'),
        ))
            ->setMethod(Arr::get($data, 'method'))
            ->setUri(Arr::get($data, 'uri'));
    }
}
