<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CmsThemeInstallFromUrlRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

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
    public function setUrl(string $url): self
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
