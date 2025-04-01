<?php

namespace Cyberfusion\CoreApi\Support;

use JsonSerializable;

abstract class CoreApiModel implements JsonSerializable
{
    protected array $attributes = [];

    protected function getAttribute(string $key): mixed
    {
        return $this->attributes[$key] ?? null;
    }

    protected function hasAttribute(string $key): bool
    {
        return array_key_exists($key, $this->attributes);
    }

    protected function setAttribute(string $key, mixed $value): void
    {
        $this->attributes[$key] = $value;
    }

    public function toArray(): array
    {
        return $this->attributes;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
