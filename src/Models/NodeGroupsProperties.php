<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodeGroupsProperties extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        ?NodeRedisGroupProperties $redis = null,
        ?NodeMariadbGroupProperties $mariaDB = null,
        ?NodeRabbitmqGroupProperties $rabbitMQ = null,
    ) {
        $this->setRedis($redis);
        $this->setMariaDB($mariaDB);
        $this->setRabbitMQ($rabbitMQ);
    }

    public function getRedis(): NodeRedisGroupProperties|null
    {
        return $this->getAttribute('Redis');
    }

    public function setRedis(?NodeRedisGroupProperties $redis): self
    {
        $this->setAttribute('Redis', $redis);
        return $this;
    }

    public function getMariaDB(): NodeMariadbGroupProperties|null
    {
        return $this->getAttribute('MariaDB');
    }

    public function setMariaDB(?NodeMariadbGroupProperties $mariaDB): self
    {
        $this->setAttribute('MariaDB', $mariaDB);
        return $this;
    }

    public function getRabbitMQ(): NodeRabbitmqGroupProperties|null
    {
        return $this->getAttribute('RabbitMQ');
    }

    public function setRabbitMQ(?NodeRabbitmqGroupProperties $rabbitMQ): self
    {
        $this->setAttribute('RabbitMQ', $rabbitMQ);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            redis: Arr::get($data, 'Redis') !== null ? NodeRedisGroupProperties::fromArray(Arr::get($data, 'Redis')) : null,
            mariaDB: Arr::get($data, 'MariaDB') !== null ? NodeMariadbGroupProperties::fromArray(Arr::get($data, 'MariaDB')) : null,
            rabbitMQ: Arr::get($data, 'RabbitMQ') !== null ? NodeRabbitmqGroupProperties::fromArray(Arr::get($data, 'RabbitMQ')) : null,
        ));
    }
}
