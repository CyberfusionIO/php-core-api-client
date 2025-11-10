<?php

namespace Cyberfusion\CoreApi\Requests\Cmses;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CmsUserCredentialsUpdateRequest;
use Cyberfusion\CoreApi\Models\DetailMessage;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * This endpoint supports only WordPress CMSes.
 */
class UpdateCmsUserCredentials extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly int $userId,
        private readonly CmsUserCredentialsUpdateRequest $cmsUserCredentialsUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/cmses/%d/users/%d/credentials', $this->id, $this->userId);
    }

    public function defaultBody(): array
    {
        return $this->cmsUserCredentialsUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns DetailMessage
     */
    public function createDtoFromResponse(Response $response): DetailMessage
    {
        return DetailMessage::fromArray($response->json());
    }
}
