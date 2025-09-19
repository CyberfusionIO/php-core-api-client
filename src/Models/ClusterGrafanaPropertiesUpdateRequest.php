<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterGrafanaPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getGrafanaDomain(): string|null
    {
        return $this->getAttribute('grafana_domain');
    }

    public function setGrafanaDomain(?string $grafanaDomain): self
    {
        $this->setAttribute('grafana_domain', $grafanaDomain);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setGrafanaDomain(Arr::get($data, 'grafana_domain'));
    }
}
