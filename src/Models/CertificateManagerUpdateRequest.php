<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CertificateManagerUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getRequestCallbackUrl(): string|null
    {
        return $this->getAttribute('requestCallbackUrl');
    }

    public function setRequestCallbackUrl(?string $requestCallbackUrl): self
    {
        $this->setAttribute('requestCallbackUrl', $requestCallbackUrl);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setRequestCallbackUrl(Arr::get($data, 'request_callback_url'));
    }
}
