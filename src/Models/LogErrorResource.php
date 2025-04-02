<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\LogMethodEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class LogErrorResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $remoteAddress, string $rawMessage, string $timestamp, string $errorMessage)
    {
        $this->setRemoteAddress($remoteAddress);
        $this->setRawMessage($rawMessage);
        $this->setTimestamp($timestamp);
        $this->setErrorMessage($errorMessage);
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

    public function getErrorMessage(): string
    {
        return $this->getAttribute('errorMessage');
    }

    /**
     * @throws ValidationException
     */
    public function setErrorMessage(?string $errorMessage = null): self
    {
        Validator::create()
            ->length(min: 1, max: 65535)
            ->assert($errorMessage);
        $this->setAttribute('error_message', $errorMessage);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            remoteAddress: Arr::get($data, 'remote_address'),
            rawMessage: Arr::get($data, 'raw_message'),
            timestamp: Arr::get($data, 'timestamp'),
            errorMessage: Arr::get($data, 'error_message'),
        ))
            ->setMethod(Arr::get($data, 'method'))
            ->setUri(Arr::get($data, 'uri'));
    }
}
