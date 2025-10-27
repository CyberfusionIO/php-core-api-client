<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\StatusCodeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class UrlRedirectsSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getDomain(): string|null
    {
        return $this->getAttribute('domain');
    }

    public function setDomain(?string $domain): self
    {
        $this->setAttribute('domain', $domain);
        return $this;
    }

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getServerAliases(): string|null
    {
        return $this->getAttribute('server_aliases');
    }

    public function setServerAliases(?string $serverAliases): self
    {
        $this->setAttribute('server_aliases', $serverAliases);
        return $this;
    }

    public function getDestinationUrl(): string|null
    {
        return $this->getAttribute('destination_url');
    }

    public function setDestinationUrl(?string $destinationUrl): self
    {
        $this->setAttribute('destination_url', $destinationUrl);
        return $this;
    }

    public function getStatusCode(): StatusCodeEnum|null
    {
        return $this->getAttribute('status_code');
    }

    public function setStatusCode(?StatusCodeEnum $statusCode): self
    {
        $this->setAttribute('status_code', $statusCode);
        return $this;
    }

    public function getKeepQueryParameters(): bool|null
    {
        return $this->getAttribute('keep_query_parameters');
    }

    public function setKeepQueryParameters(?bool $keepQueryParameters): self
    {
        $this->setAttribute('keep_query_parameters', $keepQueryParameters);
        return $this;
    }

    public function getKeepPath(): bool|null
    {
        return $this->getAttribute('keep_path');
    }

    public function setKeepPath(?bool $keepPath): self
    {
        $this->setAttribute('keep_path', $keepPath);
        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->getAttribute('description');
    }

    public function setDescription(?string $description): self
    {
        $this->setAttribute('description', $description);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'domain'), fn (self $model) => $model->setDomain(Arr::get($data, 'domain')))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'server_aliases'), fn (self $model) => $model->setServerAliases(Arr::get($data, 'server_aliases')))
            ->when(Arr::has($data, 'destination_url'), fn (self $model) => $model->setDestinationUrl(Arr::get($data, 'destination_url')))
            ->when(Arr::has($data, 'status_code'), fn (self $model) => $model->setStatusCode(Arr::get($data, 'status_code') !== null ? StatusCodeEnum::tryFrom(Arr::get($data, 'status_code')) : null))
            ->when(Arr::has($data, 'keep_query_parameters'), fn (self $model) => $model->setKeepQueryParameters(Arr::get($data, 'keep_query_parameters')))
            ->when(Arr::has($data, 'keep_path'), fn (self $model) => $model->setKeepPath(Arr::get($data, 'keep_path')))
            ->when(Arr::has($data, 'description'), fn (self $model) => $model->setDescription(Arr::get($data, 'description')));
    }
}
