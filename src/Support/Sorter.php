<?php

namespace Cyberfusion\CoreApi\Support;

use Illuminate\Support\Str;
use Vdhicts\HttpQueryBuilder\Builder;

class Sorter
{
    private array $parameters = [];

    public function add(string $field, string $direction): self
    {
        $this->parameters[] = ['field' => $field, 'value' => Str::upper($direction)];

        return $this;
    }

    public function toQuery(): string
    {
        $builder = new Builder();
        foreach ($this->parameters as $parameter) {
            $builder->add('sort', sprintf('%s:%s', $parameter['field'], $parameter['value']));
        }
        return $builder->build();
    }
}
