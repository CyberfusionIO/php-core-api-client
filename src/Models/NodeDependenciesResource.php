<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodeDependenciesResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $hostname,
        array $groups,
        array $domainRouters,
        array $daemons,
        array $crons,
        array $hostsEntries,
    ) {
        $this->setHostname($hostname);
        $this->setGroups($groups);
        $this->setDomainRouters($domainRouters);
        $this->setDaemons($daemons);
        $this->setCrons($crons);
        $this->setHostsEntries($hostsEntries);
    }

    public function getHostname(): string
    {
        return $this->getAttribute('hostname');
    }

    public function setHostname(?string $hostname = null): self
    {
        $this->setAttribute('hostname', $hostname);
        return $this;
    }

    public function getGroups(): array
    {
        return $this->getAttribute('groups');
    }

    public function setGroups(array $groups = []): self
    {
        $this->setAttribute('groups', $groups);
        return $this;
    }

    public function getDomainRouters(): array
    {
        return $this->getAttribute('domain_routers');
    }

    public function setDomainRouters(array $domainRouters = []): self
    {
        $this->setAttribute('domain_routers', $domainRouters);
        return $this;
    }

    public function getDaemons(): array
    {
        return $this->getAttribute('daemons');
    }

    public function setDaemons(array $daemons = []): self
    {
        $this->setAttribute('daemons', $daemons);
        return $this;
    }

    public function getCrons(): array
    {
        return $this->getAttribute('crons');
    }

    public function setCrons(array $crons = []): self
    {
        $this->setAttribute('crons', $crons);
        return $this;
    }

    public function getHostsEntries(): array
    {
        return $this->getAttribute('hosts_entries');
    }

    public function setHostsEntries(array $hostsEntries = []): self
    {
        $this->setAttribute('hosts_entries', $hostsEntries);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            hostname: Arr::get($data, 'hostname'),
            groups: Arr::get($data, 'groups'),
            domainRouters: Arr::get($data, 'domain_routers'),
            daemons: Arr::get($data, 'daemons'),
            crons: Arr::get($data, 'crons'),
            hostsEntries: Arr::get($data, 'hosts_entries'),
        ));
    }
}
