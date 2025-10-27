<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CertificateResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

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
        CertificateIncludes $includes,
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
        $this->setIncludes($includes);
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

    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getMainCommonName(): string
    {
        return $this->getAttribute('main_common_name');
    }

    public function setMainCommonName(string $mainCommonName): self
    {
        $this->setAttribute('main_common_name', $mainCommonName);
        return $this;
    }

    public function getCommonNames(): array
    {
        return $this->getAttribute('common_names');
    }

    /**
     * @throws ValidationException
     */
    public function setCommonNames(array $commonNames): self
    {
        Validator::create()
            ->unique()
            ->assert($commonNames);
        $this->setAttribute('common_names', $commonNames);
        return $this;
    }

    public function getExpiresAt(): string
    {
        return $this->getAttribute('expires_at');
    }

    public function setExpiresAt(string $expiresAt): self
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
    public function setCertificate(string $certificate): self
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
        return $this->getAttribute('ca_chain');
    }

    /**
     * @throws ValidationException
     */
    public function setCaChain(string $caChain): self
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
        return $this->getAttribute('private_key');
    }

    /**
     * @throws ValidationException
     */
    public function setPrivateKey(string $privateKey): self
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
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getIncludes(): CertificateIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(CertificateIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
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
            includes: CertificateIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
