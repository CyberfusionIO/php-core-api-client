<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class VirtualHostIncludes extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        ClusterResource $cluster,
        UNIXUserResource $unixUser,
        ?FPMPoolResource $fpmPool = null,
        ?PassengerAppResource $passengerApp = null,
    ) {
        $this->setCluster($cluster);
        $this->setUnixUser($unixUser);
        $this->setFpmPool($fpmPool);
        $this->setPassengerApp($passengerApp);
    }

    public function getCluster(): ClusterResource
    {
        return $this->getAttribute('cluster');
    }

    public function setCluster(?ClusterResource $cluster = null): self
    {
        $this->setAttribute('cluster', $cluster);
        return $this;
    }

    public function getUnixUser(): UNIXUserResource
    {
        return $this->getAttribute('unix_user');
    }

    public function setUnixUser(?UNIXUserResource $unixUser = null): self
    {
        $this->setAttribute('unix_user', $unixUser);
        return $this;
    }

    public function getFpmPool(): FPMPoolResource|null
    {
        return $this->getAttribute('fpm_pool');
    }

    public function setFpmPool(?FPMPoolResource $fpmPool = null): self
    {
        $this->setAttribute('fpm_pool', $fpmPool);
        return $this;
    }

    public function getPassengerApp(): PassengerAppResource|null
    {
        return $this->getAttribute('passenger_app');
    }

    public function setPassengerApp(?PassengerAppResource $passengerApp = null): self
    {
        $this->setAttribute('passenger_app', $passengerApp);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            cluster: ClusterResource::fromArray(Arr::get($data, 'cluster')),
            unixUser: UNIXUserResource::fromArray(Arr::get($data, 'unix_user')),
            fpmPool: Arr::get($data, 'fpm_pool') !== null ? FPMPoolResource::fromArray(Arr::get($data, 'fpm_pool')) : null,
            passengerApp: Arr::get($data, 'passenger_app') !== null ? PassengerAppResource::fromArray(Arr::get($data, 'passenger_app')) : null,
        ));
    }
}
