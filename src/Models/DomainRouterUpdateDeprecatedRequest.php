<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\DomainRouterCategoryEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DomainRouterUpdateDeprecatedRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $domain,
        DomainRouterCategoryEnum $category,
        int $clusterId,
        bool $forceSsl,
        ?int $virtualHostId = null,
        ?int $urlRedirectId = null,
        ?int $nodeId = null,
        ?int $certificateId = null,
        ?int $securityTxtPolicyId = null,
        ?array $firewallGroupsIds = null,
    ) {
        $this->setId($id);
        $this->setDomain($domain);
        $this->setCategory($category);
        $this->setClusterId($clusterId);
        $this->setForceSsl($forceSsl);
        $this->setVirtualHostId($virtualHostId);
        $this->setUrlRedirectId($urlRedirectId);
        $this->setNodeId($nodeId);
        $this->setCertificateId($certificateId);
        $this->setSecurityTxtPolicyId($securityTxtPolicyId);
        $this->setFirewallGroupsIds($firewallGroupsIds);
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

    public function getVirtualHostId(): int|null
    {
        return $this->getAttribute('virtualHostId');
    }

    public function setVirtualHostId(?int $virtualHostId = null): self
    {
        $this->setAttribute('virtual_host_id', $virtualHostId);
        return $this;
    }

    public function getUrlRedirectId(): int|null
    {
        return $this->getAttribute('urlRedirectId');
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
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getNodeId(): int|null
    {
        return $this->getAttribute('nodeId');
    }

    public function setNodeId(?int $nodeId = null): self
    {
        $this->setAttribute('node_id', $nodeId);
        return $this;
    }

    public function getCertificateId(): int|null
    {
        return $this->getAttribute('certificateId');
    }

    public function setCertificateId(?int $certificateId = null): self
    {
        $this->setAttribute('certificate_id', $certificateId);
        return $this;
    }

    public function getSecurityTxtPolicyId(): int|null
    {
        return $this->getAttribute('securityTxtPolicyId');
    }

    public function setSecurityTxtPolicyId(?int $securityTxtPolicyId = null): self
    {
        $this->setAttribute('security_txt_policy_id', $securityTxtPolicyId);
        return $this;
    }

    public function getFirewallGroupsIds(): array|null
    {
        return $this->getAttribute('firewallGroupsIds');
    }

    public function setFirewallGroupsIds(?array $firewallGroupsIds = []): self
    {
        $this->setAttribute('firewall_groups_ids', $firewallGroupsIds);
        return $this;
    }

    public function getForceSsl(): bool
    {
        return $this->getAttribute('forceSsl');
    }

    public function setForceSsl(?bool $forceSsl = null): self
    {
        $this->setAttribute('force_ssl', $forceSsl);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            domain: Arr::get($data, 'domain'),
            category: DomainRouterCategoryEnum::tryFrom(Arr::get($data, 'category')),
            clusterId: Arr::get($data, 'cluster_id'),
            forceSsl: Arr::get($data, 'force_ssl'),
            virtualHostId: Arr::get($data, 'virtual_host_id'),
            urlRedirectId: Arr::get($data, 'url_redirect_id'),
            nodeId: Arr::get($data, 'node_id'),
            certificateId: Arr::get($data, 'certificate_id'),
            securityTxtPolicyId: Arr::get($data, 'security_txt_policy_id'),
            firewallGroupsIds: Arr::get($data, 'firewall_groups_ids'),
        ));
    }
}
