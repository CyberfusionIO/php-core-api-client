<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\CertificateManagerCreateRequest;
use Cyberfusion\CoreApi\Models\CertificateManagerUpdateRequest;
use Cyberfusion\CoreApi\Models\CertificateManagersSearchRequest;
use Cyberfusion\CoreApi\Requests\CertificateManagers\CreateCertificateManager;
use Cyberfusion\CoreApi\Requests\CertificateManagers\DeleteCertificateManager;
use Cyberfusion\CoreApi\Requests\CertificateManagers\ListCertificateManagers;
use Cyberfusion\CoreApi\Requests\CertificateManagers\ReadCertificateManager;
use Cyberfusion\CoreApi\Requests\CertificateManagers\RequestCertificate;
use Cyberfusion\CoreApi\Requests\CertificateManagers\UpdateCertificateManager;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class CertificateManagers extends CoreApiResource
{
    public function createCertificateManager(
        CertificateManagerCreateRequest $certificateManagerCreateRequest,
    ): Response {
        return $this->connector->send(new CreateCertificateManager($certificateManagerCreateRequest));
    }

    public function listCertificateManagers(?CertificateManagersSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListCertificateManagers($includeFilters));
    }

    public function readCertificateManager(int $id): Response
    {
        return $this->connector->send(new ReadCertificateManager($id));
    }

    public function updateCertificateManager(
        int $id,
        CertificateManagerUpdateRequest $certificateManagerUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateCertificateManager($id, $certificateManagerUpdateRequest));
    }

    public function deleteCertificateManager(int $id): Response
    {
        return $this->connector->send(new DeleteCertificateManager($id));
    }

    public function requestCertificate(int $id): Response
    {
        return $this->connector->send(new RequestCertificate($id));
    }
}
