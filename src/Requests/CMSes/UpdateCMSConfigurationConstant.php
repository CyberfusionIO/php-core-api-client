<?php

namespace Cyberfusion\CoreApi\Requests\CMSes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CMSConfigurationConstant;
use Cyberfusion\CoreApi\Models\CMSConfigurationConstantUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Refer to the CMS documentation: - WordPress: https://developer.wordpress.org/apis/wp-config-php/ - NextCloud: https://docs.nextcloud.com/server/latest/admin_manual/configuration_server/config_sample_php_parameters.html
 */
class UpdateCMSConfigurationConstant extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly string $name,
        private readonly CMSConfigurationConstantUpdateRequest $cMSConfigurationConstantUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/cmses/%d/configuration-constants/%s', $this->id, $this->name);
    }

    public function defaultBody(): array
    {
        return $this->cMSConfigurationConstantUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns CMSConfigurationConstant
     */
    public function createDtoFromResponse(Response $response): CMSConfigurationConstant
    {
        return CMSConfigurationConstant::fromArray($response->json());
    }
}
