<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\CMSConfigurationConstantUpdateRequest;
use Cyberfusion\CoreApi\Models\CMSCreateRequest;
use Cyberfusion\CoreApi\Models\CMSInstallNextCloudRequest;
use Cyberfusion\CoreApi\Models\CMSInstallWordPressRequest;
use Cyberfusion\CoreApi\Models\CMSOptionUpdateRequest;
use Cyberfusion\CoreApi\Models\CMSUserCredentialsUpdateRequest;
use Cyberfusion\CoreApi\Models\CmsesSearchRequest;
use Cyberfusion\CoreApi\Requests\CMSes\CreateCMS;
use Cyberfusion\CoreApi\Requests\CMSes\DeleteCMS;
use Cyberfusion\CoreApi\Requests\CMSes\DisableCMSPlugin;
use Cyberfusion\CoreApi\Requests\CMSes\EnableCMSPlugin;
use Cyberfusion\CoreApi\Requests\CMSes\GetCMSOneTimeLogin;
use Cyberfusion\CoreApi\Requests\CMSes\GetCMSPlugins;
use Cyberfusion\CoreApi\Requests\CMSes\InstallCMSTheme;
use Cyberfusion\CoreApi\Requests\CMSes\InstallNextCloud;
use Cyberfusion\CoreApi\Requests\CMSes\InstallWordPress;
use Cyberfusion\CoreApi\Requests\CMSes\ListCMSes;
use Cyberfusion\CoreApi\Requests\CMSes\ReadCMS;
use Cyberfusion\CoreApi\Requests\CMSes\RegenerateCMSSalts;
use Cyberfusion\CoreApi\Requests\CMSes\SearchAndReplaceInCMSDatabase;
use Cyberfusion\CoreApi\Requests\CMSes\UpdateCMSConfigurationConstant;
use Cyberfusion\CoreApi\Requests\CMSes\UpdateCMSCore;
use Cyberfusion\CoreApi\Requests\CMSes\UpdateCMSOption;
use Cyberfusion\CoreApi\Requests\CMSes\UpdateCMSPlugin;
use Cyberfusion\CoreApi\Requests\CMSes\UpdateCMSUserCredentials;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class CMSes extends CoreApiResource
{
    public function createCMS(CMSCreateRequest $cMSCreateRequest): Response
    {
        return $this->connector->send(new CreateCMS($cMSCreateRequest));
    }

    public function listCMSes(?CmsesSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListCMSes($includeFilters, $includes));
    }

    public function readCMS(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadCMS($id, $includes));
    }

    public function deleteCMS(int $id): Response
    {
        return $this->connector->send(new DeleteCMS($id));
    }

    public function installWordPress(
        int $id,
        CMSInstallWordPressRequest $cMSInstallWordPressRequest,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new InstallWordPress($id, $cMSInstallWordPressRequest, $callbackUrl));
    }

    public function installNextCloud(
        int $id,
        CMSInstallNextCloudRequest $cMSInstallNextCloudRequest,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new InstallNextCloud($id, $cMSInstallNextCloudRequest, $callbackUrl));
    }

    public function getCMSOneTimeLogin(int $id): Response
    {
        return $this->connector->send(new GetCMSOneTimeLogin($id));
    }

    public function getCMSPlugins(int $id): Response
    {
        return $this->connector->send(new GetCMSPlugins($id));
    }

    public function updateCMSOption(int $id, string $name, CMSOptionUpdateRequest $cMSOptionUpdateRequest): Response
    {
        return $this->connector->send(new UpdateCMSOption($id, $name, $cMSOptionUpdateRequest));
    }

    public function updateCMSConfigurationConstant(
        int $id,
        string $name,
        CMSConfigurationConstantUpdateRequest $cMSConfigurationConstantUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateCMSConfigurationConstant($id, $name, $cMSConfigurationConstantUpdateRequest));
    }

    public function updateCMSUserCredentials(
        int $id,
        int $userId,
        CMSUserCredentialsUpdateRequest $cMSUserCredentialsUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateCMSUserCredentials($id, $userId, $cMSUserCredentialsUpdateRequest));
    }

    public function updateCMSCore(int $id, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new UpdateCMSCore($id, $callbackUrl));
    }

    public function updateCMSPlugin(int $id, string $name, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new UpdateCMSPlugin($id, $name, $callbackUrl));
    }

    public function searchAndReplaceInCMSDatabase(
        int $id,
        string $searchString,
        string $replaceString,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new SearchAndReplaceInCMSDatabase($id, $searchString, $replaceString, $callbackUrl));
    }

    public function enableCMSPlugin(int $id, string $name): Response
    {
        return $this->connector->send(new EnableCMSPlugin($id, $name));
    }

    public function disableCMSPlugin(int $id, string $name): Response
    {
        return $this->connector->send(new DisableCMSPlugin($id, $name));
    }

    public function regenerateCMSSalts(int $id): Response
    {
        return $this->connector->send(new RegenerateCMSSalts($id));
    }

    public function installCMSTheme(int $id): Response
    {
        return $this->connector->send(new InstallCMSTheme($id));
    }
}
