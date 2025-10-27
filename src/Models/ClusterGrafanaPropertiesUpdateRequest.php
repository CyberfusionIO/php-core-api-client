<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterGrafanaPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

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
            ->when(Arr::has($data, 'grafana_domain'), fn (self $model) => $model->setGrafanaDomain(Arr::get($data, 'grafana_domain')));
    }
}
