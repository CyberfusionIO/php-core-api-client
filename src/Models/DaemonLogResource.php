<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DaemonLogResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $applicationName,
        int $priority,
        int $pid,
        string $message,
        string $nodeHostname,
        string $timestamp,
    ) {
        $this->setApplicationName($applicationName);
        $this->setPriority($priority);
        $this->setPid($pid);
        $this->setMessage($message);
        $this->setNodeHostname($nodeHostname);
        $this->setTimestamp($timestamp);
    }

    public function getApplicationName(): string
    {
        return $this->getAttribute('application_name');
    }

    /**
     * @throws ValidationException
     */
    public function setApplicationName(?string $applicationName = null): self
    {
        Validator::create()
            ->length(min: 1, max: 65535)
            ->assert($applicationName);
        $this->setAttribute('application_name', $applicationName);
        return $this;
    }

    public function getPriority(): int
    {
        return $this->getAttribute('priority');
    }

    public function setPriority(?int $priority = null): self
    {
        $this->setAttribute('priority', $priority);
        return $this;
    }

    public function getPid(): int
    {
        return $this->getAttribute('pid');
    }

    public function setPid(?int $pid = null): self
    {
        $this->setAttribute('pid', $pid);
        return $this;
    }

    public function getMessage(): string
    {
        return $this->getAttribute('message');
    }

    /**
     * @throws ValidationException
     */
    public function setMessage(?string $message = null): self
    {
        Validator::create()
            ->length(min: 1, max: 65535)
            ->assert($message);
        $this->setAttribute('message', $message);
        return $this;
    }

    public function getNodeHostname(): string
    {
        return $this->getAttribute('node_hostname');
    }

    public function setNodeHostname(?string $nodeHostname = null): self
    {
        $this->setAttribute('node_hostname', $nodeHostname);
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
            applicationName: Arr::get($data, 'application_name'),
            priority: Arr::get($data, 'priority'),
            pid: Arr::get($data, 'pid'),
            message: Arr::get($data, 'message'),
            nodeHostname: Arr::get($data, 'node_hostname'),
            timestamp: Arr::get($data, 'timestamp'),
        ));
    }
}
