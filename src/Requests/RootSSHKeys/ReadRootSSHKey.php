<?php

namespace Cyberfusion\CoreApi\Requests\RootSSHKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\RootSSHKeyResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadRootSSHKey extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
        private readonly array $includes = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/root-ssh-keys/%d', $this->id);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['includes'] = implode(',', $this->includes);

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns RootSSHKeyResource
     */
    public function createDtoFromResponse(Response $response): RootSSHKeyResource
    {
        return RootSSHKeyResource::fromArray($response->json());
    }
}
