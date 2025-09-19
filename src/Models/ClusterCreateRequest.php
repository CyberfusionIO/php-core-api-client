<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $customerId, int $siteId, string $description)
    {
        $this->setCustomerId($customerId);
        $this->setSiteId($siteId);
        $this->setDescription($description);
    }

    public function getCustomerId(): int
    {
        return $this->getAttribute('customer_id');
    }

    public function setCustomerId(?int $customerId = null): self
    {
        $this->setAttribute('customer_id', $customerId);
        return $this;
    }

    public function getSiteId(): int
    {
        return $this->getAttribute('site_id');
    }

    public function setSiteId(?int $siteId = null): self
    {
        $this->setAttribute('site_id', $siteId);
        return $this;
    }

    public function getDescription(): string
    {
        return $this->getAttribute('description');
    }

    /**
     * @throws ValidationException
     */
    public function setDescription(?string $description = null): self
    {
        Validator::create()
            ->length(min: 1, max: 255)
            ->regex('/^[a-zA-Z0-9-_. ]+$/')
            ->assert($description);
        $this->setAttribute('description', $description);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            customerId: Arr::get($data, 'customer_id'),
            siteId: Arr::get($data, 'site_id'),
            description: Arr::get($data, 'description'),
        ));
    }
}
