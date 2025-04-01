<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailHostnameUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getCertificateId(): int|null
    {
        return $this->getAttribute('certificateId');
    }

    public function setCertificateId(?int $certificateId): self
    {
        $this->setAttribute('certificateId', $certificateId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setCertificateId(Arr::get($data, 'certificate_id'));
    }
}
