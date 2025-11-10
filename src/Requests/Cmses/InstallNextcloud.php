<?php

namespace Cyberfusion\CoreApi\Requests\Cmses;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CmsInstallNextcloudRequest;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * You must manually configure the cron after installing. The OpenAPI documentation for crons contains an example of the Nextcloud cron. Nextcloud only accepts requests to 'trusted domains'. When installing Nextcloud on a CMS, the CMS's virtual host's domain and server aliases are automatically added. When adding or removing server aliases after the installation, update trusted domains manually. You can use the 'Update CMS Configuration Constant' endpoint (configuration constant name is `trusted_domains`). Nextcloud is not supported on virtual hosts with the nginx server software. Nextcloud requires directives to be added to the `.php` location, which the Core API does not support. (See: https://docs.nextcloud.com/server/latest/admin_manual/installation/nginx.html#nextcloud-in-the-webroot-of-nginx)
 */
class InstallNextcloud extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly CmsInstallNextcloudRequest $cmsInstallNextcloudRequest,
        private readonly ?string $callbackUrl = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/cmses/%d/install/nextcloud', $this->id);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['callback_url'] = $this->callbackUrl;

        return array_filter($parameters);
    }

    public function defaultBody(): array
    {
        return $this->cmsInstallNextcloudRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns TaskCollectionResource
     */
    public function createDtoFromResponse(Response $response): TaskCollectionResource
    {
        return TaskCollectionResource::fromArray($response->json());
    }
}
