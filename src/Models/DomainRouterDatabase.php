<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\DomainRouterCategoryEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DomainRouterDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $domain,
        DomainRouterCategoryEnum $category,
        int $clusterId,
        bool $forceSsl,
        ClusterDatabase $cluster,
        ?int $virtualHostId = null,
        ?int $urlRedirectId = null,
        ?int $nodeId = null,
        ?int $certificateId = null,
        ?int $securityTxtPolicyId = null,
        ?array $firewallGroupsIds = null,
        ?VirtualHostDatabase $virtualHost = null,
        ?URLRedirectDatabase $urlRedirect = null,
        ?NodeDatabase $node = null,
        ?CertificateDatabase $certificate = null,
        ?SecurityTXTPolicyDatabase $securityTxtPolicy = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setDomain($domain);
        $this->setCategory($category);
        $this->setClusterId($clusterId);
        $this->setForceSsl($forceSsl);
        $this->setCluster($cluster);
        $this->setVirtualHostId($virtualHostId);
        $this->setUrlRedirectId($urlRedirectId);
        $this->setNodeId($nodeId);
        $this->setCertificateId($certificateId);
        $this->setSecurityTxtPolicyId($securityTxtPolicyId);
        $this->setFirewallGroupsIds($firewallGroupsIds);
        $this->setVirtualHost($virtualHost);
        $this->setUrlRedirect($urlRedirect);
        $this->setNode($node);
        $this->setCertificate($certificate);
        $this->setSecurityTxtPolicy($securityTxtPolicy);
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
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
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

    public function getVirtualHostId(): int|null
    {
        return $this->getAttribute('virtual_host_id');
    }

    public function setVirtualHostId(?int $virtualHostId = null): self
    {
        $this->setAttribute('virtual_host_id', $virtualHostId);
        return $this;
    }

    public function getUrlRedirectId(): int|null
    {
        return $this->getAttribute('url_redirect_id');
    }

    public function setUrlRedirectId(?int $urlRedirectId = null): self
    {
        $this->setAttribute('url_redirect_id', $urlRedirectId);
        return $this;
    }

    public function getCategory(): DomainRouterCategoryEnum
    {
        return $this->getAttribute('category');
    }

    public function setCategory(?DomainRouterCategoryEnum $category = null): self
    {
        $this->setAttribute('category', $category);
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

    public function getNodeId(): int|null
    {
        return $this->getAttribute('node_id');
    }

    public function setNodeId(?int $nodeId = null): self
    {
        $this->setAttribute('node_id', $nodeId);
        return $this;
    }

    public function getCertificateId(): int|null
    {
        return $this->getAttribute('certificate_id');
    }

    public function setCertificateId(?int $certificateId = null): self
    {
        $this->setAttribute('certificate_id', $certificateId);
        return $this;
    }

    public function getSecurityTxtPolicyId(): int|null
    {
        return $this->getAttribute('security_txt_policy_id');
    }

    public function setSecurityTxtPolicyId(?int $securityTxtPolicyId = null): self
    {
        $this->setAttribute('security_txt_policy_id', $securityTxtPolicyId);
        return $this;
    }

    public function getFirewallGroupsIds(): array|null
    {
        return $this->getAttribute('firewall_groups_ids');
    }

    public function setFirewallGroupsIds(?array $firewallGroupsIds = []): self
    {
        $this->setAttribute('firewall_groups_ids', $firewallGroupsIds);
        return $this;
    }

    public function getForceSsl(): bool
    {
        return $this->getAttribute('force_ssl');
    }

    public function setForceSsl(?bool $forceSsl = null): self
    {
        $this->setAttribute('force_ssl', $forceSsl);
        return $this;
    }

    public function getVirtualHost(): VirtualHostDatabase|null
    {
        return $this->getAttribute('virtual_host');
    }

    public function setVirtualHost(?VirtualHostDatabase $virtualHost = null): self
    {
        $this->setAttribute('virtual_host', $virtualHost);
        return $this;
    }

    public function getUrlRedirect(): URLRedirectDatabase|null
    {
        return $this->getAttribute('url_redirect');
    }

    public function setUrlRedirect(?URLRedirectDatabase $urlRedirect = null): self
    {
        $this->setAttribute('url_redirect', $urlRedirect);
        return $this;
    }

    public function getNode(): NodeDatabase|null
    {
        return $this->getAttribute('node');
    }

    public function setNode(?NodeDatabase $node = null): self
    {
        $this->setAttribute('node', $node);
        return $this;
    }

    public function getCertificate(): CertificateDatabase|null
    {
        return $this->getAttribute('certificate');
    }

    public function setCertificate(?CertificateDatabase $certificate = null): self
    {
        $this->setAttribute('certificate', $certificate);
        return $this;
    }

    public function getSecurityTxtPolicy(): SecurityTXTPolicyDatabase|null
    {
        return $this->getAttribute('security_txt_policy');
    }

    public function setSecurityTxtPolicy(?SecurityTXTPolicyDatabase $securityTxtPolicy = null): self
    {
        $this->setAttribute('security_txt_policy', $securityTxtPolicy);
        return $this;
    }

    public function getCluster(): ClusterDatabase
    {
        return $this->getAttribute('cluster');
    }

    public function setCluster(?ClusterDatabase $cluster = null): self
    {
        $this->setAttribute('cluster', $cluster);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            domain: Arr::get($data, 'domain'),
            category: DomainRouterCategoryEnum::tryFrom(Arr::get($data, 'category')),
            clusterId: Arr::get($data, 'cluster_id'),
            forceSsl: Arr::get($data, 'force_ssl'),
            cluster: ClusterDatabase::fromArray(Arr::get($data, 'cluster')),
            virtualHostId: Arr::get($data, 'virtual_host_id'),
            urlRedirectId: Arr::get($data, 'url_redirect_id'),
            nodeId: Arr::get($data, 'node_id'),
            certificateId: Arr::get($data, 'certificate_id'),
            securityTxtPolicyId: Arr::get($data, 'security_txt_policy_id'),
            firewallGroupsIds: Arr::get($data, 'firewall_groups_ids'),
            virtualHost: Arr::get($data, 'virtual_host') !== null ? VirtualHostDatabase::fromArray(Arr::get($data, 'virtual_host')) : null,
            urlRedirect: Arr::get($data, 'url_redirect') !== null ? URLRedirectDatabase::fromArray(Arr::get($data, 'url_redirect')) : null,
            node: Arr::get($data, 'node') !== null ? NodeDatabase::fromArray(Arr::get($data, 'node')) : null,
            certificate: Arr::get($data, 'certificate') !== null ? CertificateDatabase::fromArray(Arr::get($data, 'certificate')) : null,
            securityTxtPolicy: Arr::get($data, 'security_txt_policy') !== null ? SecurityTXTPolicyDatabase::fromArray(Arr::get($data, 'security_txt_policy')) : null,
        ));
    }
}
