<?php

namespace Cyberfusion\CoreApi\Requests\CMSes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CMSInstallNextCloudRequest;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
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
 * You must manually configure the cron after installing. The OpenAPI documentation for crons contains an example of the NextCloud cron. NextCloud only accepts requests to 'trusted domains'. When installing NextCloud on a CMS, the CMS's virtual host's domain and server aliases are automatically added. When adding or removing server aliases after the installation, update trusted domains manually. You can use the 'Update CMS Configuration Constant' endpoint (configuration constant name is `trusted_domains`). NextCloud is not supported on virtual hosts with the nginx server software. NextCloud requires directives to be added to the `.php` location, which the Core API does not support. (See: https://docs.nextcloud.com/server/latest/admin_manual/installation/nginx.html#nextcloud-in-the-webroot-of-nginx)
 */
class InstallNextCloud extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly CMSInstallNextCloudRequest $cMSInstallNextCloudRequest,
        private readonly ?string $callbackUrl = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/cmses/%d/install/nextcloud')
            ->addPathParameter($this->id)
            ->addQueryParameter('callback_url', $this->callbackUrl)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->cMSInstallNextCloudRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns TaskCollectionResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): TaskCollectionResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, TaskCollectionResource::class)->build();
    }
}
