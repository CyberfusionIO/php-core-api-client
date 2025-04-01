<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\StatusCodeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class URLRedirectCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $domain,
        int $clusterId,
        string $destinationUrl,
        StatusCodeEnum $statusCode,
        bool $keepQueryParameters,
        bool $keepPath,
        ?string $description = null,
    ) {
        $this->setDomain($domain);
        $this->setClusterId($clusterId);
        $this->setDestinationUrl($destinationUrl);
        $this->setStatusCode($statusCode);
        $this->setKeepQueryParameters($keepQueryParameters);
        $this->setKeepPath($keepPath);
        $this->setDescription($description);
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
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('clusterId', $clusterId);
        return $this;
    }

    public function getServerAliases(): array|null
    {
        return $this->getAttribute('serverAliases');
    }

    /**
     * @throws ValidationException
     */
    public function setServerAliases(?array $serverAliases): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($serverAliases));
        $this->setAttribute('serverAliases', $serverAliases);
        return $this;
    }

    public function getDestinationUrl(): string
    {
        return $this->getAttribute('destinationUrl');
    }

    /**
     * @throws ValidationException
     */
    public function setDestinationUrl(?string $destinationUrl = null): self
    {
        Validator::create()
            ->length(min: 1, max: 2083)
            ->assert($destinationUrl);
        $this->setAttribute('destinationUrl', $destinationUrl);
        return $this;
    }

    public function getStatusCode(): StatusCodeEnum
    {
        return $this->getAttribute('statusCode');
    }

    public function setStatusCode(?StatusCodeEnum $statusCode = null): self
    {
        $this->setAttribute('statusCode', $statusCode);
        return $this;
    }

    public function getKeepQueryParameters(): bool
    {
        return $this->getAttribute('keepQueryParameters');
    }

    public function setKeepQueryParameters(?bool $keepQueryParameters = null): self
    {
        $this->setAttribute('keepQueryParameters', $keepQueryParameters);
        return $this;
    }

    public function getKeepPath(): bool
    {
        return $this->getAttribute('keepPath');
    }

    public function setKeepPath(?bool $keepPath = null): self
    {
        $this->setAttribute('keepPath', $keepPath);
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

    public static function fromArray(array $data): self
    {
        return (new self(
            domain: Arr::get($data, 'domain'),
            clusterId: Arr::get($data, 'cluster_id'),
            destinationUrl: Arr::get($data, 'destination_url'),
            statusCode: StatusCodeEnum::tryFrom(Arr::get($data, 'status_code')),
            keepQueryParameters: Arr::get($data, 'keep_query_parameters'),
            keepPath: Arr::get($data, 'keep_path'),
            description: Arr::get($data, 'description'),
        ))
            ->setServerAliases(Arr::get($data, 'server_aliases'));
    }
}
