<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterGrafanaPropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $grafanaDomain)
    {
        $this->setGrafanaDomain($grafanaDomain);
    }

    public function getGrafanaDomain(): string
    {
        return $this->getAttribute('grafana_domain');
    }

    public function setGrafanaDomain(?string $grafanaDomain = null): self
    {
        $this->setAttribute('grafana_domain', $grafanaDomain);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            grafanaDomain: Arr::get($data, 'grafana_domain'),
        ));
    }
}
