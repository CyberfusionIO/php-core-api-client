<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CertificateManagerUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getRequestCallbackUrl(): string|null
    {
        return $this->getAttribute('request_callback_url');
    }

    public function setRequestCallbackUrl(?string $requestCallbackUrl): self
    {
        $this->setAttribute('request_callback_url', $requestCallbackUrl);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'request_callback_url'), fn (self $model) => $model->setRequestCallbackUrl(Arr::get($data, 'request_callback_url')));
    }
}
