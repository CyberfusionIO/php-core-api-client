<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class VirtualHostIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        ?ClusterResource $cluster = null,
        ?UnixUserResource $unixUser = null,
        ?FpmPoolResource $fpmPool = null,
        ?PassengerAppResource $passengerApp = null,
    ) {
        $this->setCluster($cluster);
        $this->setUnixUser($unixUser);
        $this->setFpmPool($fpmPool);
        $this->setPassengerApp($passengerApp);
    }

    public function getCluster(): ClusterResource|null
    {
        return $this->getAttribute('cluster');
    }

    public function setCluster(?ClusterResource $cluster): self
    {
        $this->setAttribute('cluster', $cluster);
        return $this;
    }

    public function getUnixUser(): UnixUserResource|null
    {
        return $this->getAttribute('unix_user');
    }

    public function setUnixUser(?UnixUserResource $unixUser): self
    {
        $this->setAttribute('unix_user', $unixUser);
        return $this;
    }

    public function getFpmPool(): FpmPoolResource|null
    {
        return $this->getAttribute('fpm_pool');
    }

    public function setFpmPool(?FpmPoolResource $fpmPool): self
    {
        $this->setAttribute('fpm_pool', $fpmPool);
        return $this;
    }

    public function getPassengerApp(): PassengerAppResource|null
    {
        return $this->getAttribute('passenger_app');
    }

    public function setPassengerApp(?PassengerAppResource $passengerApp): self
    {
        $this->setAttribute('passenger_app', $passengerApp);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            cluster: Arr::get($data, 'cluster') !== null ? ClusterResource::fromArray(Arr::get($data, 'cluster')) : null,
            unixUser: Arr::get($data, 'unix_user') !== null ? UnixUserResource::fromArray(Arr::get($data, 'unix_user')) : null,
            fpmPool: Arr::get($data, 'fpm_pool') !== null ? FpmPoolResource::fromArray(Arr::get($data, 'fpm_pool')) : null,
            passengerApp: Arr::get($data, 'passenger_app') !== null ? PassengerAppResource::fromArray(Arr::get($data, 'passenger_app')) : null,
        ));
    }
}
