<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailHostnameIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(?CertificateResource $certificate = null, ?ClusterResource $cluster = null)
    {
        $this->setCertificate($certificate);
        $this->setCluster($cluster);
    }

    public function getCertificate(): CertificateResource|null
    {
        return $this->getAttribute('certificate');
    }

    public function setCertificate(?CertificateResource $certificate): self
    {
        $this->setAttribute('certificate', $certificate);
        return $this;
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

    public static function fromArray(array $data): self
    {
        return (new self(
            certificate: Arr::get($data, 'certificate') !== null ? CertificateResource::fromArray(Arr::get($data, 'certificate')) : null,
            cluster: Arr::get($data, 'cluster') !== null ? ClusterResource::fromArray(Arr::get($data, 'cluster')) : null,
        ));
    }
}
