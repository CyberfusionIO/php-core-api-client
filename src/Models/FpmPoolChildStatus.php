<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\HTTPMethod;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FpmPoolChildStatus extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $currentRequestDuration,
        HTTPMethod $httpMethod,
        string $httpUri,
        string $script,
        ?string $basicAuthenticationUser = null,
    ) {
        $this->setCurrentRequestDuration($currentRequestDuration);
        $this->setHttpMethod($httpMethod);
        $this->setHttpUri($httpUri);
        $this->setScript($script);
        $this->setBasicAuthenticationUser($basicAuthenticationUser);
    }

    public function getCurrentRequestDuration(): int
    {
        return $this->getAttribute('current_request_duration');
    }

    public function setCurrentRequestDuration(int $currentRequestDuration): self
    {
        $this->setAttribute('current_request_duration', $currentRequestDuration);
        return $this;
    }

    public function getHttpMethod(): HTTPMethod
    {
        return $this->getAttribute('http_method');
    }

    public function setHttpMethod(HTTPMethod $httpMethod): self
    {
        $this->setAttribute('http_method', $httpMethod);
        return $this;
    }

    public function getHttpUri(): string
    {
        return $this->getAttribute('http_uri');
    }

    public function setHttpUri(string $httpUri): self
    {
        $this->setAttribute('http_uri', $httpUri);
        return $this;
    }

    public function getBasicAuthenticationUser(): string|null
    {
        return $this->getAttribute('basic_authentication_user');
    }

    public function setBasicAuthenticationUser(?string $basicAuthenticationUser): self
    {
        $this->setAttribute('basic_authentication_user', $basicAuthenticationUser);
        return $this;
    }

    public function getScript(): string
    {
        return $this->getAttribute('script');
    }

    public function setScript(string $script): self
    {
        $this->setAttribute('script', $script);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            currentRequestDuration: Arr::get($data, 'current_request_duration'),
            httpMethod: HTTPMethod::tryFrom(Arr::get($data, 'http_method')),
            httpUri: Arr::get($data, 'http_uri'),
            script: Arr::get($data, 'script'),
            basicAuthenticationUser: Arr::get($data, 'basic_authentication_user'),
        ));
    }
}
