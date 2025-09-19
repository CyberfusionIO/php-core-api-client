<?php

namespace Cyberfusion\CoreApi\Models;

use ArrayObject;
use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\HTTPMethod;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class RequestLogResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $ipAddress,
        string $path,
        HTTPMethod $method,
        ArrayObject $queryParameters,
        int $apiUserId,
        string $requestId,
        mixed $body = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setIpAddress($ipAddress);
        $this->setPath($path);
        $this->setMethod($method);
        $this->setQueryParameters($queryParameters);
        $this->setApiUserId($apiUserId);
        $this->setRequestId($requestId);
        $this->setBody($body);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(?int $id = null): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getIpAddress(): string
    {
        return $this->getAttribute('ip_address');
    }

    public function setIpAddress(?string $ipAddress = null): self
    {
        $this->setAttribute('ip_address', $ipAddress);
        return $this;
    }

    public function getPath(): string
    {
        return $this->getAttribute('path');
    }

    public function setPath(?string $path = null): self
    {
        $this->setAttribute('path', $path);
        return $this;
    }

    public function getMethod(): HTTPMethod
    {
        return $this->getAttribute('method');
    }

    public function setMethod(?HTTPMethod $method = null): self
    {
        $this->setAttribute('method', $method);
        return $this;
    }

    public function getQueryParameters(): ArrayObject
    {
        return $this->getAttribute('query_parameters');
    }

    public function setQueryParameters(?ArrayObject $queryParameters = null): self
    {
        $this->setAttribute('query_parameters', $queryParameters);
        return $this;
    }

    public function getBody(): mixed
    {
        return $this->getAttribute('body');
    }

    public function setBody(mixed $body = null): self
    {
        $this->setAttribute('body', $body);
        return $this;
    }

    public function getApiUserId(): int
    {
        return $this->getAttribute('api_user_id');
    }

    public function setApiUserId(?int $apiUserId = null): self
    {
        $this->setAttribute('api_user_id', $apiUserId);
        return $this;
    }

    public function getRequestId(): string
    {
        return $this->getAttribute('request_id');
    }

    public function setRequestId(?string $requestId = null): self
    {
        $this->setAttribute('request_id', $requestId);
        return $this;
    }

    public function getIncludes(): RequestLogIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?RequestLogIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            ipAddress: Arr::get($data, 'ip_address'),
            path: Arr::get($data, 'path'),
            method: HTTPMethod::tryFrom(Arr::get($data, 'method')),
            queryParameters: new ArrayObject(Arr::get($data, 'query_parameters')),
            apiUserId: Arr::get($data, 'api_user_id'),
            requestId: Arr::get($data, 'request_id'),
            body: Arr::get($data, 'body'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? RequestLogIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
