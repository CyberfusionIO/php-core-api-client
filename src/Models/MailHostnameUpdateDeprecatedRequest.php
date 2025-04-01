<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailHostnameUpdateDeprecatedRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $id, string $domain, int $clusterId, ?int $certificateId = null)
    {
        $this->setId($id);
        $this->setDomain($domain);
        $this->setClusterId($clusterId);
        $this->setCertificateId($certificateId);
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

    public function getDomain(): string
    {
        return $this->getAttribute('domain');
    }

    public function setDomain(?string $domain = null): self
    {
        $this->setAttribute('domain', $domain);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('clusterId', $clusterId);
        return $this;
    }

    public function getCertificateId(): int|null
    {
        return $this->getAttribute('certificateId');
    }

    public function setCertificateId(?int $certificateId = null): self
    {
        $this->setAttribute('certificateId', $certificateId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            domain: Arr::get($data, 'domain'),
            clusterId: Arr::get($data, 'cluster_id'),
            certificateId: Arr::get($data, 'certificate_id'),
        ));
    }
}
