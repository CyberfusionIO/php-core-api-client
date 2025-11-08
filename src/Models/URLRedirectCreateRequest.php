<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\StatusCodeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class URLRedirectCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        string $domain,
        int $clusterId,
        array $serverAliases,
        string $destinationUrl,
        ?string $description = null,
    ) {
        $this->setDomain($domain);
        $this->setClusterId($clusterId);
        $this->setServerAliases($serverAliases);
        $this->setDestinationUrl($destinationUrl);
        $this->setDescription($description);
    }

    public function getDomain(): string
    {
        return $this->getAttribute('domain');
    }

    public function setDomain(string $domain): self
    {
        $this->setAttribute('domain', $domain);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getServerAliases(): array
    {
        return $this->getAttribute('server_aliases');
    }

    /**
     * @throws ValidationException
     */
    public function setServerAliases(array $serverAliases): self
    {
        Validator::create()
            ->unique()
            ->assert($serverAliases);
        $this->setAttribute('server_aliases', $serverAliases);
        return $this;
    }

    public function getDestinationUrl(): string
    {
        return $this->getAttribute('destination_url');
    }

    /**
     * @throws ValidationException
     */
    public function setDestinationUrl(string $destinationUrl): self
    {
        Validator::create()
            ->length(min: 1, max: 2083)
            ->assert($destinationUrl);
        $this->setAttribute('destination_url', $destinationUrl);
        return $this;
    }

    public function getStatusCode(): StatusCodeEnum
    {
        return $this->getAttribute('status_code');
    }

    public function setStatusCode(StatusCodeEnum $statusCode): self
    {
        $this->setAttribute('status_code', $statusCode);
        return $this;
    }

    public function getKeepQueryParameters(): bool
    {
        return $this->getAttribute('keep_query_parameters');
    }

    public function setKeepQueryParameters(bool $keepQueryParameters): self
    {
        $this->setAttribute('keep_query_parameters', $keepQueryParameters);
        return $this;
    }

    public function getKeepPath(): bool
    {
        return $this->getAttribute('keep_path');
    }

    public function setKeepPath(bool $keepPath): self
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
            domain: Arr::get($data, 'domain'),
            clusterId: Arr::get($data, 'cluster_id'),
            serverAliases: Arr::get($data, 'server_aliases'),
            destinationUrl: Arr::get($data, 'destination_url'),
            description: Arr::get($data, 'description'),
        ))
            ->when(Arr::has($data, 'status_code'), fn (self $model) => $model->setStatusCode(StatusCodeEnum::tryFrom(Arr::get($data, 'status_code', 308))))
            ->when(Arr::has($data, 'keep_query_parameters'), fn (self $model) => $model->setKeepQueryParameters(Arr::get($data, 'keep_query_parameters', true)))
            ->when(Arr::has($data, 'keep_path'), fn (self $model) => $model->setKeepPath(Arr::get($data, 'keep_path', true)));
    }
}
