<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BodyLoginAccessToken extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $username, string $password)
    {
        $this->setUsername($username);
        $this->setPassword($password);
    }

    public function getGrantType(): string|null
    {
        return $this->getAttribute('grant_type');
    }

    public function setGrantType(?string $grantType): self
    {
        $this->setAttribute('grant_type', $grantType);
        return $this;
    }

    public function getUsername(): string
    {
        return $this->getAttribute('username');
    }

    public function setUsername(string $username): self
    {
        $this->setAttribute('username', $username);
        return $this;
    }

    public function getPassword(): string
    {
        return $this->getAttribute('password');
    }

    public function setPassword(string $password): self
    {
        $this->setAttribute('password', $password);
        return $this;
    }

    public function getScope(): string
    {
        return $this->getAttribute('scope');
    }

    public function setScope(string $scope): self
    {
        $this->setAttribute('scope', $scope);
        return $this;
    }

    public function getClientId(): string|null
    {
        return $this->getAttribute('client_id');
    }

    public function setClientId(?string $clientId): self
    {
        $this->setAttribute('client_id', $clientId);
        return $this;
    }

    public function getClientSecret(): string|null
    {
        return $this->getAttribute('client_secret');
    }

    public function setClientSecret(?string $clientSecret): self
    {
        $this->setAttribute('client_secret', $clientSecret);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            username: Arr::get($data, 'username'),
            password: Arr::get($data, 'password'),
        ))
            ->when(Arr::has($data, 'grant_type'), fn (self $model) => $model->setGrantType(Arr::get($data, 'grant_type')))
            ->when(Arr::has($data, 'scope'), fn (self $model) => $model->setScope(Arr::get($data, 'scope', '')))
            ->when(Arr::has($data, 'client_id'), fn (self $model) => $model->setClientId(Arr::get($data, 'client_id')))
            ->when(Arr::has($data, 'client_secret'), fn (self $model) => $model->setClientSecret(Arr::get($data, 'client_secret')));
    }
}
