<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\StatusCodeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class URLRedirectDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $domain,
        int $clusterId,
        array $serverAliases,
        string $destinationUrl,
        StatusCodeEnum $statusCode,
        bool $keepQueryParameters,
        bool $keepPath,
        ClusterDatabase $cluster,
        ?string $description = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setDomain($domain);
        $this->setClusterId($clusterId);
        $this->setServerAliases($serverAliases);
        $this->setDestinationUrl($destinationUrl);
        $this->setStatusCode($statusCode);
        $this->setKeepQueryParameters($keepQueryParameters);
        $this->setKeepPath($keepPath);
        $this->setCluster($cluster);
        $this->setDescription($description);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(?int $id = null): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getDomain(): string
    {
        return $this->getAttribute('domain');
    }

    public function setDomain(?string $domain = null): self
    {
        $this->setAttribute('domain', $domain);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId = null): self
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
    public function setServerAliases(array $serverAliases = []): self
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
    public function setDestinationUrl(?string $destinationUrl = null): self
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

    public function setStatusCode(?StatusCodeEnum $statusCode = null): self
    {
        $this->setAttribute('status_code', $statusCode);
        return $this;
    }

    public function getKeepQueryParameters(): bool
    {
        return $this->getAttribute('keep_query_parameters');
    }

    public function setKeepQueryParameters(?bool $keepQueryParameters = null): self
    {
        $this->setAttribute('keep_query_parameters', $keepQueryParameters);
        return $this;
    }

    public function getKeepPath(): bool
    {
        return $this->getAttribute('keep_path');
    }

    public function setKeepPath(?bool $keepPath = null): self
    {
        $this->setAttribute('keep_path', $keepPath);
        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->getAttribute('description');
    }

    public function setDescription(?string $description = null): self
    {
        $this->setAttribute('description', $description);
        return $this;
    }

    public function getCluster(): ClusterDatabase
    {
        return $this->getAttribute('cluster');
    }

    public function setCluster(?ClusterDatabase $cluster = null): self
    {
        $this->setAttribute('cluster', $cluster);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            domain: Arr::get($data, 'domain'),
            clusterId: Arr::get($data, 'cluster_id'),
            serverAliases: Arr::get($data, 'server_aliases'),
            destinationUrl: Arr::get($data, 'destination_url'),
            statusCode: StatusCodeEnum::tryFrom(Arr::get($data, 'status_code')),
            keepQueryParameters: Arr::get($data, 'keep_query_parameters'),
            keepPath: Arr::get($data, 'keep_path'),
            cluster: ClusterDatabase::fromArray(Arr::get($data, 'cluster')),
            description: Arr::get($data, 'description'),
        ));
    }
}
