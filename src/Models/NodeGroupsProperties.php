<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodeGroupsProperties extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        ?NodeRedisGroupProperties $redis = null,
        ?NodeMariaDBGroupProperties $mariaDB = null,
        ?NodeRabbitMQGroupProperties $rabbitMQ = null,
    ) {
        $this->setRedis($redis);
        $this->setMariaDB($mariaDB);
        $this->setRabbitMQ($rabbitMQ);
    }

    public function getRedis(): NodeRedisGroupProperties|null
    {
        return $this->getAttribute('redis');
    }

    public function setRedis(?NodeRedisGroupProperties $redis = null): self
    {
        $this->setAttribute('redis', $redis);
        return $this;
    }

    public function getMariaDB(): NodeMariaDBGroupProperties|null
    {
        return $this->getAttribute('mariaDB');
    }

    public function setMariaDB(?NodeMariaDBGroupProperties $mariaDB = null): self
    {
        $this->setAttribute('mariaDB', $mariaDB);
        return $this;
    }

    public function getRabbitMQ(): NodeRabbitMQGroupProperties|null
    {
        return $this->getAttribute('rabbitMQ');
    }

    public function setRabbitMQ(?NodeRabbitMQGroupProperties $rabbitMQ = null): self
    {
        $this->setAttribute('rabbitMQ', $rabbitMQ);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            redis: Arr::get($data, 'Redis') !== null ? NodeRedisGroupProperties::fromArray(Arr::get($data, 'Redis')) : null,
            mariaDB: Arr::get($data, 'MariaDB') !== null ? NodeMariaDBGroupProperties::fromArray(Arr::get($data, 'MariaDB')) : null,
            rabbitMQ: Arr::get($data, 'RabbitMQ') !== null ? NodeRabbitMQGroupProperties::fromArray(Arr::get($data, 'RabbitMQ')) : null,
        ));
    }
}
