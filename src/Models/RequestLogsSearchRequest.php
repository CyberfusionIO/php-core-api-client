<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\HTTPMethod;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class RequestLogsSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getIpAddress(): string|null
    {
        return $this->getAttribute('ip_address');
    }

    public function setIpAddress(?string $ipAddress): self
    {
        $this->setAttribute('ip_address', $ipAddress);
        return $this;
    }

    public function getPath(): string|null
    {
        return $this->getAttribute('path');
    }

    public function setPath(?string $path): self
    {
        $this->setAttribute('path', $path);
        return $this;
    }

    public function getMethod(): HTTPMethod|null
    {
        return $this->getAttribute('method');
    }

    public function setMethod(?HTTPMethod $method): self
    {
        $this->setAttribute('method', $method);
        return $this;
    }

    public function getApiUserId(): int|null
    {
        return $this->getAttribute('api_user_id');
    }

    public function setApiUserId(?int $apiUserId): self
    {
        $this->setAttribute('api_user_id', $apiUserId);
        return $this;
    }

    public function getRequestId(): string|null
    {
        return $this->getAttribute('request_id');
    }

    public function setRequestId(?string $requestId): self
    {
        $this->setAttribute('request_id', $requestId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'ip_address'), fn (self $model) => $model->setIpAddress(Arr::get($data, 'ip_address')))
            ->when(Arr::has($data, 'path'), fn (self $model) => $model->setPath(Arr::get($data, 'path')))
            ->when(Arr::has($data, 'method'), fn (self $model) => $model->setMethod(Arr::get($data, 'method') !== null ? HTTPMethod::tryFrom(Arr::get($data, 'method')) : null))
            ->when(Arr::has($data, 'api_user_id'), fn (self $model) => $model->setApiUserId(Arr::get($data, 'api_user_id')))
            ->when(Arr::has($data, 'request_id'), fn (self $model) => $model->setRequestId(Arr::get($data, 'request_id')));
    }
}
