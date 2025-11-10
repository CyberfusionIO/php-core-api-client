<?php

namespace Cyberfusion\CoreApi\Requests\Cmses;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CmsConfigurationConstant;
use Cyberfusion\CoreApi\Models\CmsConfigurationConstantUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Refer to the CMS documentation: - WordPress: https://developer.wordpress.org/apis/wp-config-php/ - Nextcloud: https://docs.nextcloud.com/server/latest/admin_manual/configuration_server/config_sample_php_parameters.html
 */
class UpdateCmsConfigurationConstant extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly string $name,
        private readonly CmsConfigurationConstantUpdateRequest $cmsConfigurationConstantUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/cmses/%d/configuration-constants/%s', $this->id, $this->name);
    }

    public function defaultBody(): array
    {
        return $this->cmsConfigurationConstantUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns CmsConfigurationConstant
     */
    public function createDtoFromResponse(Response $response): CmsConfigurationConstant
    {
        return CmsConfigurationConstant::fromArray($response->json());
    }
}
