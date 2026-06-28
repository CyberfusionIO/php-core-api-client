<?php

namespace Cyberfusion\CoreApi\Requests\AvailableVersions;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\CoreApiUnauthenticated;
use Cyberfusion\CoreApi\Models\PhpVersionResource;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Contracts\Authenticator;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListAvailablePhpVersions extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly array $includes = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/available-versions/php';
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['includes'] = implode(',', $this->includes);

        return array_filter($parameters);
    }

    public function defaultAuth(): ?Authenticator
    {
        return new CoreApiUnauthenticated();
    }

    /**
     * @throws JsonException
     * @returns Collection<PhpVersionResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => PhpVersionResource::fromArray($item));
    }
}
