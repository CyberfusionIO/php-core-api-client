<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\CertificateManagerCreateRequest;
use Cyberfusion\CoreApi\Models\CertificateManagerUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Models\CertificateManagerUpdateRequest;
use Cyberfusion\CoreApi\Requests\CertificateManagers\CreateCertificateManager;
use Cyberfusion\CoreApi\Requests\CertificateManagers\DeleteCertificateManager;
use Cyberfusion\CoreApi\Requests\CertificateManagers\DeprecatedUpdateCertificateManager;
use Cyberfusion\CoreApi\Requests\CertificateManagers\ListCertificateManagers;
use Cyberfusion\CoreApi\Requests\CertificateManagers\ReadCertificateManager;
use Cyberfusion\CoreApi\Requests\CertificateManagers\RequestCertificate;
use Cyberfusion\CoreApi\Requests\CertificateManagers\UpdateCertificateManager;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class CertificateManagers extends BaseResource
{
    public function createCertificateManager(
        CertificateManagerCreateRequest $certificateManagerCreateRequest,
    ): Response {
        return $this->connector->send(new CreateCertificateManager($certificateManagerCreateRequest));
    }

    public function listCertificateManagers(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListCertificateManagers($skip, $limit, $filter, $sort));
    }

    public function readCertificateManager(int $id): Response
    {
        return $this->connector->send(new ReadCertificateManager($id));
    }

    public function deprecatedUpdateCertificateManager(
        int $id,
        CertificateManagerUpdateDeprecatedRequest $certificateManagerUpdateDeprecatedRequest,
    ): Response {
        return $this->connector->send(new DeprecatedUpdateCertificateManager($id, $certificateManagerUpdateDeprecatedRequest));
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
