<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DomainRouterIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        ClusterResource $cluster,
        ?VirtualHostResource $virtualHost = null,
        ?URLRedirectResource $urlRedirect = null,
        ?NodeResource $node = null,
        ?CertificateResource $certificate = null,
        ?SecurityTXTPolicyResource $securityTxtPolicy = null,
    ) {
        $this->setCluster($cluster);
        $this->setVirtualHost($virtualHost);
        $this->setUrlRedirect($urlRedirect);
        $this->setNode($node);
        $this->setCertificate($certificate);
        $this->setSecurityTxtPolicy($securityTxtPolicy);
    }

    public function getVirtualHost(): VirtualHostResource|null
    {
        return $this->getAttribute('virtual_host');
    }

    public function setVirtualHost(?VirtualHostResource $virtualHost): self
    {
        $this->setAttribute('virtual_host', $virtualHost);
        return $this;
    }

    public function getUrlRedirect(): URLRedirectResource|null
    {
        return $this->getAttribute('url_redirect');
    }

    public function setUrlRedirect(?URLRedirectResource $urlRedirect): self
    {
        $this->setAttribute('url_redirect', $urlRedirect);
        return $this;
    }

    public function getNode(): NodeResource|null
    {
        return $this->getAttribute('node');
    }

    public function setNode(?NodeResource $node): self
    {
        $this->setAttribute('node', $node);
        return $this;
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

    public function getSecurityTxtPolicy(): SecurityTXTPolicyResource|null
    {
        return $this->getAttribute('security_txt_policy');
    }

    public function setSecurityTxtPolicy(?SecurityTXTPolicyResource $securityTxtPolicy): self
    {
        $this->setAttribute('security_txt_policy', $securityTxtPolicy);
        return $this;
    }

    public function getCluster(): ClusterResource
    {
        return $this->getAttribute('cluster');
    }

    public function setCluster(ClusterResource $cluster): self
    {
        $this->setAttribute('cluster', $cluster);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            cluster: ClusterResource::fromArray(Arr::get($data, 'cluster')),
            virtualHost: Arr::get($data, 'virtual_host') !== null ? VirtualHostResource::fromArray(Arr::get($data, 'virtual_host')) : null,
            urlRedirect: Arr::get($data, 'url_redirect') !== null ? URLRedirectResource::fromArray(Arr::get($data, 'url_redirect')) : null,
            node: Arr::get($data, 'node') !== null ? NodeResource::fromArray(Arr::get($data, 'node')) : null,
            certificate: Arr::get($data, 'certificate') !== null ? CertificateResource::fromArray(Arr::get($data, 'certificate')) : null,
            securityTxtPolicy: Arr::get($data, 'security_txt_policy') !== null ? SecurityTXTPolicyResource::fromArray(Arr::get($data, 'security_txt_policy')) : null,
        ));
    }
}
