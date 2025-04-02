<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\APIUserAuthenticationMethod;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class APIUserInfo extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $username,
        bool $isActive,
        bool $isSuperuser,
        APIUserAuthenticationMethod $authenticationMethod,
        ?array $clusters = null,
        ?int $customerId = null,
    ) {
        $this->setId($id);
        $this->setUsername($username);
        $this->setIsActive($isActive);
        $this->setIsSuperuser($isSuperuser);
        $this->setAuthenticationMethod($authenticationMethod);
        $this->setClusters($clusters);
        $this->setCustomerId($customerId);
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

    public function getUsername(): string
    {
        return $this->getAttribute('username');
    }

    /**
     * @throws ValidationException
     */
    public function setUsername(?string $username = null): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($username);
        $this->setAttribute('username', $username);
        return $this;
    }

    public function getIsActive(): bool
    {
        return $this->getAttribute('isActive');
    }

    public function setIsActive(?bool $isActive = null): self
    {
        $this->setAttribute('is_active', $isActive);
        return $this;
    }

    public function getIsSuperuser(): bool
    {
        return $this->getAttribute('isSuperuser');
    }

    public function setIsSuperuser(?bool $isSuperuser = null): self
    {
        $this->setAttribute('is_superuser', $isSuperuser);
        return $this;
    }

    public function getClusters(): array|null
    {
        return $this->getAttribute('clusters');
    }

    /**
     * @throws ValidationException
     */
    public function setClusters(?array $clusters = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($clusters));
        $this->setAttribute('clusters', $clusters);
        return $this;
    }

    public function getCustomerId(): int|null
    {
        return $this->getAttribute('customerId');
    }

    public function setCustomerId(?int $customerId = null): self
    {
        $this->setAttribute('customer_id', $customerId);
        return $this;
    }

    public function getAuthenticationMethod(): APIUserAuthenticationMethod
    {
        return $this->getAttribute('authenticationMethod');
    }

    public function setAuthenticationMethod(?APIUserAuthenticationMethod $authenticationMethod = null): self
    {
        $this->setAttribute('authentication_method', $authenticationMethod);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            username: Arr::get($data, 'username'),
            isActive: Arr::get($data, 'is_active'),
            isSuperuser: Arr::get($data, 'is_superuser'),
            authenticationMethod: APIUserAuthenticationMethod::tryFrom(Arr::get($data, 'authentication_method')),
            clusters: Arr::get($data, 'clusters'),
            customerId: Arr::get($data, 'customer_id'),
        ));
    }
}
