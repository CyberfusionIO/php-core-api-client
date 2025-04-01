<?php

namespace Cyberfusion\CoreApi\Support;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class ManualRequest extends Request implements HasBody
{
    use HasJsonBody;

    public function __construct(
        protected string $url,
        protected Method $method = Method::GET,
        protected array $data = [],
    ) {
    }

    public function defaultBody(): array
    {
        return $this->data;
    }

    public function resolveEndpoint(): string
    {
        return $this->url;
    }
}
