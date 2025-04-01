<?php

namespace Cyberfusion\CoreApi\Support;

use Vdhicts\HttpQueryBuilder\Builder;

class Filter
{
    private array $parameters = [];

    public function add(string $field, mixed $value): self
    {
        $this->parameters[] = ['field' => $field, 'value' => $value];

        return $this;
    }

    public function toQuery(): string
    {
        $builder = new Builder();
        foreach ($this->parameters as $parameter) {
            $builder->add('filter', sprintf('%s:%s', $parameter['field'], $parameter['value']));
        }
        return $builder->build();
    }
}
