<?php

namespace Cyberfusion\CoreApi\Requests\SecurityTxtPolicies;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\SecurityTxtPolicyResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadSecurityTxtPolicy extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
        private readonly array $includes = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/security-txt-policies/%d', $this->id);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['includes'] = implode(',', $this->includes);

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns SecurityTxtPolicyResource
     */
    public function createDtoFromResponse(Response $response): SecurityTxtPolicyResource
    {
        return SecurityTxtPolicyResource::fromArray($response->json());
    }
}
