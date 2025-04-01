<?php

namespace Cyberfusion\CoreApi\Requests\CMSes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CMSConfigurationConstant;
use Cyberfusion\CoreApi\Models\CMSConfigurationConstantUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * For WordPress, WordPress Toolkit must be enabled on cluster (`wordpress_toolkit_enabled`). Refer to the CMS documentation: - WordPress: https://developer.wordpress.org/apis/wp-config-php/ - NextCloud: https://docs.nextcloud.com/server/latest/admin_manual/configuration_server/config_sample_php_parameters.html
 */
class DeprecatedUpdateCMSConfigurationConstant extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly string $name,
        private readonly CMSConfigurationConstantUpdateDeprecatedRequest $cMSConfigurationConstantUpdateDeprecatedRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/cmses/%d/configuration-constants/%s')
            ->addPathParameter($this->id)
            ->addPathParameter($this->name)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->cMSConfigurationConstantUpdateDeprecatedRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns CMSConfigurationConstant|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): CMSConfigurationConstant|DetailMessage|Collection
    {
        return DtoBuilder::for($response, CMSConfigurationConstant::class)->build();
    }
}
