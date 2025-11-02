<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BasicAuthenticationRealmIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        ?HtpasswdFileResource $htpasswdFile = null,
        ?VirtualHostResource $virtualHost = null,
        ?ClusterResource $cluster = null,
    ) {
        $this->setHtpasswdFile($htpasswdFile);
        $this->setVirtualHost($virtualHost);
        $this->setCluster($cluster);
    }

    public function getHtpasswdFile(): HtpasswdFileResource|null
    {
        return $this->getAttribute('htpasswd_file');
    }

    public function setHtpasswdFile(?HtpasswdFileResource $htpasswdFile): self
    {
        $this->setAttribute('htpasswd_file', $htpasswdFile);
        return $this;
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
            htpasswdFile: Arr::get($data, 'htpasswd_file') !== null ? HtpasswdFileResource::fromArray(Arr::get($data, 'htpasswd_file')) : null,
            virtualHost: Arr::get($data, 'virtual_host') !== null ? VirtualHostResource::fromArray(Arr::get($data, 'virtual_host')) : null,
            cluster: Arr::get($data, 'cluster') !== null ? ClusterResource::fromArray(Arr::get($data, 'cluster')) : null,
        ));
    }
}
