<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
class CertificateDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $mainCommonName,
        array $commonNames,
        string $expiresAt,
        string $certificate,
        string $caChain,
        string $privateKey,
        int $clusterId,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setMainCommonName($mainCommonName);
        $this->setCommonNames($commonNames);
        $this->setExpiresAt($expiresAt);
        $this->setCertificate($certificate);
        $this->setCaChain($caChain);
        $this->setPrivateKey($privateKey);
        $this->setClusterId($clusterId);
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
        return $this->getAttribute('createdAt');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getMainCommonName(): string
    {
        return $this->getAttribute('mainCommonName');
    }

    public function setMainCommonName(?string $mainCommonName = null): self
    {
        $this->setAttribute('main_common_name', $mainCommonName);
        return $this;
    }

    public function getCommonNames(): array
    {
        return $this->getAttribute('commonNames');
    }

    /**
     * @throws ValidationException
     */
    public function setCommonNames(?array $commonNames = null): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($commonNames));
        $this->setAttribute('common_names', $commonNames);
        return $this;
    }

    public function getExpiresAt(): string
    {
        return $this->getAttribute('expiresAt');
    }

    public function setExpiresAt(?string $expiresAt = null): self
    {
        $this->setAttribute('expires_at', $expiresAt);
        return $this;
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
            ->regex('/^[a-zA-Z0-9-_\+\/=\n\\ ]+$/')
            ->assert($certificate);
        $this->setAttribute('certificate', $certificate);
        return $this;
    }

    public function getCaChain(): string
    {
        return $this->getAttribute('caChain');
    }

    /**
     * @throws ValidationException
     */
    public function setCaChain(?string $caChain = null): self
    {
        Validator::create()
            ->length(min: 1, max: 65535)
            ->regex('/^[a-zA-Z0-9-_\+\/=\n\\ ]+$/')
            ->assert($caChain);
        $this->setAttribute('ca_chain', $caChain);
        return $this;
    }

    public function getPrivateKey(): string
    {
        return $this->getAttribute('privateKey');
    }

    /**
     * @throws ValidationException
     */
    public function setPrivateKey(?string $privateKey = null): self
    {
        Validator::create()
            ->length(min: 1, max: 65535)
            ->regex('/^[a-zA-Z0-9-_\+\/=\n\\ ]+$/')
            ->assert($privateKey);
        $this->setAttribute('private_key', $privateKey);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            mainCommonName: Arr::get($data, 'main_common_name'),
            commonNames: Arr::get($data, 'common_names'),
            expiresAt: Arr::get($data, 'expires_at'),
            certificate: Arr::get($data, 'certificate'),
            caChain: Arr::get($data, 'ca_chain'),
            privateKey: Arr::get($data, 'private_key'),
            clusterId: Arr::get($data, 'cluster_id'),
        ));
    }
}
