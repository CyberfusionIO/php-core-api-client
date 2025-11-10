<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\CmsConfigurationConstantUpdateRequest;
use Cyberfusion\CoreApi\Models\CmsCreateRequest;
use Cyberfusion\CoreApi\Models\CmsInstallNextcloudRequest;
use Cyberfusion\CoreApi\Models\CmsInstallWordpressRequest;
use Cyberfusion\CoreApi\Models\CmsOptionUpdateRequest;
use Cyberfusion\CoreApi\Models\CmsUserCredentialsUpdateRequest;
use Cyberfusion\CoreApi\Models\CmsesSearchRequest;
use Cyberfusion\CoreApi\Requests\Cmses\CreateCms;
use Cyberfusion\CoreApi\Requests\Cmses\DeleteCms;
use Cyberfusion\CoreApi\Requests\Cmses\DisableCmsPlugin;
use Cyberfusion\CoreApi\Requests\Cmses\EnableCmsPlugin;
use Cyberfusion\CoreApi\Requests\Cmses\GetCmsOneTimeLogin;
use Cyberfusion\CoreApi\Requests\Cmses\GetCmsPlugins;
use Cyberfusion\CoreApi\Requests\Cmses\InstallCmsTheme;
use Cyberfusion\CoreApi\Requests\Cmses\InstallNextcloud;
use Cyberfusion\CoreApi\Requests\Cmses\InstallWordpress;
use Cyberfusion\CoreApi\Requests\Cmses\ListCmses;
use Cyberfusion\CoreApi\Requests\Cmses\ReadCms;
use Cyberfusion\CoreApi\Requests\Cmses\RegenerateCmsSalts;
use Cyberfusion\CoreApi\Requests\Cmses\SearchAndReplaceInCmsDatabase;
use Cyberfusion\CoreApi\Requests\Cmses\UpdateCmsConfigurationConstant;
use Cyberfusion\CoreApi\Requests\Cmses\UpdateCmsCore;
use Cyberfusion\CoreApi\Requests\Cmses\UpdateCmsOption;
use Cyberfusion\CoreApi\Requests\Cmses\UpdateCmsPlugin;
use Cyberfusion\CoreApi\Requests\Cmses\UpdateCmsUserCredentials;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class Cmses extends CoreApiResource
{
    public function createCms(CmsCreateRequest $cmsCreateRequest): Response
    {
        return $this->connector->send(new CreateCms($cmsCreateRequest));
    }

    public function listCmses(?CmsesSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListCmses($includeFilters, $includes));
    }

    public function readCms(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadCms($id, $includes));
    }

    public function deleteCms(int $id): Response
    {
        return $this->connector->send(new DeleteCms($id));
    }

    public function installWordpress(
        int $id,
        CmsInstallWordpressRequest $cmsInstallWordpressRequest,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new InstallWordpress($id, $cmsInstallWordpressRequest, $callbackUrl));
    }

    public function installNextcloud(
        int $id,
        CmsInstallNextcloudRequest $cmsInstallNextcloudRequest,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new InstallNextcloud($id, $cmsInstallNextcloudRequest, $callbackUrl));
    }

    public function getCmsOneTimeLogin(int $id): Response
    {
        return $this->connector->send(new GetCmsOneTimeLogin($id));
    }

    public function getCmsPlugins(int $id): Response
    {
        return $this->connector->send(new GetCmsPlugins($id));
    }

    public function updateCmsOption(int $id, string $name, CmsOptionUpdateRequest $cmsOptionUpdateRequest): Response
    {
        return $this->connector->send(new UpdateCmsOption($id, $name, $cmsOptionUpdateRequest));
    }

    public function updateCmsConfigurationConstant(
        int $id,
        string $name,
        CmsConfigurationConstantUpdateRequest $cmsConfigurationConstantUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateCmsConfigurationConstant($id, $name, $cmsConfigurationConstantUpdateRequest));
    }

    public function updateCmsUserCredentials(
        int $id,
        int $userId,
        CmsUserCredentialsUpdateRequest $cmsUserCredentialsUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateCmsUserCredentials($id, $userId, $cmsUserCredentialsUpdateRequest));
    }

    public function updateCmsCore(int $id, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new UpdateCmsCore($id, $callbackUrl));
    }

    public function updateCmsPlugin(int $id, string $name, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new UpdateCmsPlugin($id, $name, $callbackUrl));
    }

    public function searchAndReplaceInCmsDatabase(
        int $id,
        string $searchString,
        string $replaceString,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new SearchAndReplaceInCmsDatabase($id, $searchString, $replaceString, $callbackUrl));
    }

    public function enableCmsPlugin(int $id, string $name): Response
    {
        return $this->connector->send(new EnableCmsPlugin($id, $name));
    }

    public function disableCmsPlugin(int $id, string $name): Response
    {
        return $this->connector->send(new DisableCmsPlugin($id, $name));
    }

    public function regenerateCmsSalts(int $id): Response
    {
        return $this->connector->send(new RegenerateCmsSalts($id));
    }

    public function installCmsTheme(int $id): Response
    {
        return $this->connector->send(new InstallCmsTheme($id));
    }
}
