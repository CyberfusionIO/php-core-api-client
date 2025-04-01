<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\TokenTypeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TokenResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $accessToken, TokenTypeEnum $tokenType, int $expiresIn)
    {
        $this->setAccessToken($accessToken);
        $this->setTokenType($tokenType);
        $this->setExpiresIn($expiresIn);
    }

    public function getAccessToken(): string
    {
        return $this->getAttribute('accessToken');
    }

    /**
     * @throws ValidationException
     */
    public function setAccessToken(?string $accessToken = null): self
    {
        Validator::create()
            ->length(min: 1)
            ->regex('/^[ -~]+$/')
            ->assert($accessToken);
        $this->setAttribute('accessToken', $accessToken);
        return $this;
    }

    public function getTokenType(): TokenTypeEnum
    {
        return $this->getAttribute('tokenType');
    }

    public function setTokenType(?TokenTypeEnum $tokenType = null): self
    {
        $this->setAttribute('tokenType', $tokenType);
        return $this;
    }

    public function getExpiresIn(): int
    {
        return $this->getAttribute('expiresIn');
    }

    public function setExpiresIn(?int $expiresIn = null): self
    {
        $this->setAttribute('expiresIn', $expiresIn);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            accessToken: Arr::get($data, 'access_token'),
            tokenType: TokenTypeEnum::tryFrom(Arr::get($data, 'token_type')),
            expiresIn: Arr::get($data, 'expires_in'),
        ));
    }
}
