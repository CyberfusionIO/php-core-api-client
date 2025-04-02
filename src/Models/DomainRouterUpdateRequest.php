<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DomainRouterUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getNodeId(): int|null
    {
        return $this->getAttribute('nodeId');
    }

    public function setNodeId(?int $nodeId): self
    {
        $this->setAttribute('node_id', $nodeId);
        return $this;
    }

    public function getCertificateId(): int|null
    {
        return $this->getAttribute('certificateId');
    }

    public function setCertificateId(?int $certificateId): self
    {
        $this->setAttribute('certificate_id', $certificateId);
        return $this;
    }

    public function getSecurityTxtPolicyId(): int|null
    {
        return $this->getAttribute('securityTxtPolicyId');
    }

    public function setSecurityTxtPolicyId(?int $securityTxtPolicyId): self
    {
        $this->setAttribute('security_txt_policy_id', $securityTxtPolicyId);
        return $this;
    }

    public function getFirewallGroupsIds(): array|null
    {
        return $this->getAttribute('firewallGroupsIds');
    }

    public function setFirewallGroupsIds(?array $firewallGroupsIds): self
    {
        $this->setAttribute('firewall_groups_ids', $firewallGroupsIds);
        return $this;
    }

    public function getForceSsl(): bool
    {
        return $this->getAttribute('forceSsl');
    }

    public function setForceSsl(bool $forceSsl): self
    {
        $this->setAttribute('force_ssl', $forceSsl);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setNodeId(Arr::get($data, 'node_id'))
            ->setCertificateId(Arr::get($data, 'certificate_id'))
            ->setSecurityTxtPolicyId(Arr::get($data, 'security_txt_policy_id'))
            ->setFirewallGroupsIds(Arr::get($data, 'firewall_groups_ids'))
            ->setForceSsl(Arr::get($data, 'force_ssl'));
    }
}
