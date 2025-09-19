<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailHostnameIncludes extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(CertificateResource $certificate, ClusterResource $cluster)
    {
        $this->setCertificate($certificate);
        $this->setCluster($cluster);
    }

    public function getCertificate(): CertificateResource
    {
        return $this->getAttribute('certificate');
    }

    public function setCertificate(?CertificateResource $certificate = null): self
    {
        $this->setAttribute('certificate', $certificate);
        return $this;
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

    public static function fromArray(array $data): self
    {
        return (new self(
            certificate: CertificateResource::fromArray(Arr::get($data, 'certificate')),
            cluster: ClusterResource::fromArray(Arr::get($data, 'cluster')),
        ));
    }
}
