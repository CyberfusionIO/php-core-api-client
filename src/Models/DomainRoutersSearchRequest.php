<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\DomainRouterCategoryEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DomainRoutersSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getDomain(): string|null
    {
        return $this->getAttribute('domain');
    }

    public function setDomain(?string $domain): self
    {
        $this->setAttribute('domain', $domain);
        return $this;
    }

    public function getVirtualHostId(): int|null
    {
        return $this->getAttribute('virtual_host_id');
    }

    public function setVirtualHostId(?int $virtualHostId): self
    {
        $this->setAttribute('virtual_host_id', $virtualHostId);
        return $this;
    }

    public function getUrlRedirectId(): int|null
    {
        return $this->getAttribute('url_redirect_id');
    }

    public function setUrlRedirectId(?int $urlRedirectId): self
    {
        $this->setAttribute('url_redirect_id', $urlRedirectId);
        return $this;
    }

    public function getCategory(): DomainRouterCategoryEnum|null
    {
        return $this->getAttribute('category');
    }

    public function setCategory(?DomainRouterCategoryEnum $category): self
    {
        $this->setAttribute('category', $category);
        return $this;
    }

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getNodeId(): int|null
    {
        return $this->getAttribute('node_id');
    }

    public function setNodeId(?int $nodeId): self
    {
        $this->setAttribute('node_id', $nodeId);
        return $this;
    }

    public function getCertificateId(): int|null
    {
        return $this->getAttribute('certificate_id');
    }

    public function setCertificateId(?int $certificateId): self
    {
        $this->setAttribute('certificate_id', $certificateId);
        return $this;
    }

    public function getSecurityTxtPolicyId(): int|null
    {
        return $this->getAttribute('security_txt_policy_id');
    }

    public function setSecurityTxtPolicyId(?int $securityTxtPolicyId): self
    {
        $this->setAttribute('security_txt_policy_id', $securityTxtPolicyId);
        return $this;
    }

    public function getFirewallGroupId(): int|null
    {
        return $this->getAttribute('firewall_group_id');
    }

    public function setFirewallGroupId(?int $firewallGroupId): self
    {
        $this->setAttribute('firewall_group_id', $firewallGroupId);
        return $this;
    }

    public function getForceSsl(): bool|null
    {
        return $this->getAttribute('force_ssl');
    }

    public function setForceSsl(?bool $forceSsl): self
    {
        $this->setAttribute('force_ssl', $forceSsl);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'domain'), fn (self $model) => $model->setDomain(Arr::get($data, 'domain')))
            ->when(Arr::has($data, 'virtual_host_id'), fn (self $model) => $model->setVirtualHostId(Arr::get($data, 'virtual_host_id')))
            ->when(Arr::has($data, 'url_redirect_id'), fn (self $model) => $model->setUrlRedirectId(Arr::get($data, 'url_redirect_id')))
            ->when(Arr::has($data, 'category'), fn (self $model) => $model->setCategory(Arr::get($data, 'category') !== null ? DomainRouterCategoryEnum::tryFrom(Arr::get($data, 'category')) : null))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'node_id'), fn (self $model) => $model->setNodeId(Arr::get($data, 'node_id')))
            ->when(Arr::has($data, 'certificate_id'), fn (self $model) => $model->setCertificateId(Arr::get($data, 'certificate_id')))
            ->when(Arr::has($data, 'security_txt_policy_id'), fn (self $model) => $model->setSecurityTxtPolicyId(Arr::get($data, 'security_txt_policy_id')))
            ->when(Arr::has($data, 'firewall_group_id'), fn (self $model) => $model->setFirewallGroupId(Arr::get($data, 'firewall_group_id')))
            ->when(Arr::has($data, 'force_ssl'), fn (self $model) => $model->setForceSsl(Arr::get($data, 'force_ssl')));
    }
}
