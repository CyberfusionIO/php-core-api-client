<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CertificateCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $certificate, string $caChain, string $privateKey, int $clusterId)
    {
        $this->setCertificate($certificate);
        $this->setCaChain($caChain);
        $this->setPrivateKey($privateKey);
        $this->setClusterId($clusterId);
    }

    public function getCertificate(): string
    {
        return $this->getAttribute('certificate');
    }

    /**
     * @throws ValidationException
     */
    public function setCertificate(?string $certificate = null): self
    {
        Validator::create()
            ->length(min: 1, max: 65535)
            ->regex('/^[a-zA-Z0-9-_\+\/=\n ]+$/')
            ->assert($certificate);
        $this->setAttribute('certificate', $certificate);
        return $this;
    }

    public function getCaChain(): string
    {
        return $this->getAttribute('ca_chain');
    }

    /**
     * @throws ValidationException
     */
    public function setCaChain(?string $caChain = null): self
    {
        Validator::create()
            ->length(min: 1, max: 65535)
            ->regex('/^[a-zA-Z0-9-_\+\/=\n ]+$/')
            ->assert($caChain);
        $this->setAttribute('ca_chain', $caChain);
        return $this;
    }

    public function getPrivateKey(): string
    {
        return $this->getAttribute('private_key');
    }

    /**
     * @throws ValidationException
     */
    public function setPrivateKey(?string $privateKey = null): self
    {
        Validator::create()
            ->length(min: 1, max: 65535)
            ->regex('/^[a-zA-Z0-9-_\+\/=\n ]+$/')
            ->assert($privateKey);
        $this->setAttribute('private_key', $privateKey);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            certificate: Arr::get($data, 'certificate'),
            caChain: Arr::get($data, 'ca_chain'),
            privateKey: Arr::get($data, 'private_key'),
            clusterId: Arr::get($data, 'cluster_id'),
        ));
    }
}
