<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\APIUserAuthenticationMethodEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class APIUserInfo extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $username,
        bool $isActive,
        bool $isSuperuser,
        array $clusters,
        array $customers,
        array $serviceAccounts,
        APIUserAuthenticationMethodEnum $authenticationMethod,
    ) {
        $this->setId($id);
        $this->setUsername($username);
        $this->setIsActive($isActive);
        $this->setIsSuperuser($isSuperuser);
        $this->setClusters($clusters);
        $this->setCustomers($customers);
        $this->setServiceAccounts($serviceAccounts);
        $this->setAuthenticationMethod($authenticationMethod);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(int $id): self
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
    public function setUsername(string $username): self
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
        return $this->getAttribute('is_active');
    }

    public function setIsActive(bool $isActive): self
    {
        $this->setAttribute('is_active', $isActive);
        return $this;
    }

    public function getIsSuperuser(): bool
    {
        return $this->getAttribute('is_superuser');
    }

    public function setIsSuperuser(bool $isSuperuser): self
    {
        $this->setAttribute('is_superuser', $isSuperuser);
        return $this;
    }

    public function getClusters(): array
    {
        return $this->getAttribute('clusters');
    }

    /**
     * @throws ValidationException
     */
    public function setClusters(array $clusters): self
    {
        Validator::create()
            ->unique()
            ->assert($clusters);
        $this->setAttribute('clusters', $clusters);
        return $this;
    }

    public function getCustomers(): array
    {
        return $this->getAttribute('customers');
    }

    /**
     * @throws ValidationException
     */
    public function setCustomers(array $customers): self
    {
        Validator::create()
            ->unique()
            ->assert($customers);
        $this->setAttribute('customers', $customers);
        return $this;
    }

    public function getServiceAccounts(): array
    {
        return $this->getAttribute('service_accounts');
    }

    /**
     * @throws ValidationException
     */
    public function setServiceAccounts(array $serviceAccounts): self
    {
        Validator::create()
            ->unique()
            ->assert($serviceAccounts);
        $this->setAttribute('service_accounts', $serviceAccounts);
        return $this;
    }

    public function getAuthenticationMethod(): APIUserAuthenticationMethodEnum
    {
        return $this->getAttribute('authentication_method');
    }

    public function setAuthenticationMethod(APIUserAuthenticationMethodEnum $authenticationMethod): self
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
            clusters: Arr::get($data, 'clusters'),
            customers: Arr::get($data, 'customers'),
            serviceAccounts: Arr::get($data, 'service_accounts'),
            authenticationMethod: APIUserAuthenticationMethodEnum::tryFrom(Arr::get($data, 'authentication_method')),
        ));
    }
}
