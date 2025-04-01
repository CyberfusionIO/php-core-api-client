<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\StatusCodeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class URLRedirectUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
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
    public function setDestinationUrl(string $destinationUrl): self
    {
        Validator::optional(Validator::create()
            ->length(min: 1, max: 2083))
            ->assert($destinationUrl);
        $this->setAttribute('destinationUrl', $destinationUrl);
        return $this;
    }

    public function getStatusCode(): StatusCodeEnum
    {
        return $this->getAttribute('statusCode');
    }

    public function setStatusCode(StatusCodeEnum $statusCode): self
    {
        $this->setAttribute('statusCode', $statusCode);
        return $this;
    }

    public function getKeepQueryParameters(): bool
    {
        return $this->getAttribute('keepQueryParameters');
    }

    public function setKeepQueryParameters(bool $keepQueryParameters): self
    {
        $this->setAttribute('keepQueryParameters', $keepQueryParameters);
        return $this;
    }

    public function getKeepPath(): bool
    {
        return $this->getAttribute('keepPath');
    }

    public function setKeepPath(bool $keepPath): self
    {
        $this->setAttribute('keepPath', $keepPath);
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
            ->setServerAliases(Arr::get($data, 'server_aliases'))
            ->setDestinationUrl(Arr::get($data, 'destination_url'))
            ->setStatusCode(Arr::get($data, 'status_code'))
            ->setKeepQueryParameters(Arr::get($data, 'keep_query_parameters'))
            ->setKeepPath(Arr::get($data, 'keep_path'))
            ->setDescription(Arr::get($data, 'description'));
    }
}
