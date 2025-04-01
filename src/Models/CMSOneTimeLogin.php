<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CMSOneTimeLogin extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $url)
    {
        $this->setUrl($url);
    }

    public function getUrl(): string
    {
        return $this->getAttribute('url');
    }

    /**
     * @throws ValidationException
     */
    public function setUrl(?string $url = null): self
    {
        Validator::create()
            ->length(min: 1, max: 2083)
            ->assert($url);
        $this->setAttribute('url', $url);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            url: Arr::get($data, 'url'),
        ));
    }
}
