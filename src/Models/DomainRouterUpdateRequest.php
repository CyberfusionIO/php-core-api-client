<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DomainRouterUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

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

    public function getFirewallGroupsIds(): array|null
    {
        return $this->getAttribute('firewall_groups_ids');
    }

    public function setFirewallGroupsIds(?array $firewallGroupsIds): self
    {
        $this->setAttribute('firewall_groups_ids', $firewallGroupsIds);
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
            ->when(Arr::has($data, 'node_id'), fn (self $model) => $model->setNodeId(Arr::get($data, 'node_id')))
            ->when(Arr::has($data, 'certificate_id'), fn (self $model) => $model->setCertificateId(Arr::get($data, 'certificate_id')))
            ->when(Arr::has($data, 'security_txt_policy_id'), fn (self $model) => $model->setSecurityTxtPolicyId(Arr::get($data, 'security_txt_policy_id')))
            ->when(Arr::has($data, 'firewall_groups_ids'), fn (self $model) => $model->setFirewallGroupsIds(Arr::get($data, 'firewall_groups_ids')))
            ->when(Arr::has($data, 'force_ssl'), fn (self $model) => $model->setForceSsl(Arr::get($data, 'force_ssl')));
    }
}
