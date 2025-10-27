<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\CertificateCreateRequest;
use Cyberfusion\CoreApi\Models\CertificatesSearchRequest;
use Cyberfusion\CoreApi\Requests\Certificates\CreateCertificate;
use Cyberfusion\CoreApi\Requests\Certificates\DeleteCertificate;
use Cyberfusion\CoreApi\Requests\Certificates\ListCertificates;
use Cyberfusion\CoreApi\Requests\Certificates\ReadCertificate;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class Certificates extends CoreApiResource
{
    public function createCertificate(CertificateCreateRequest $certificateCreateRequest): Response
    {
        return $this->connector->send(new CreateCertificate($certificateCreateRequest));
    }

    public function listCertificates(?CertificatesSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListCertificates($includeFilters));
    }

    public function readCertificate(int $id): Response
    {
        return $this->connector->send(new ReadCertificate($id));
    }

    public function deleteCertificate(int $id): Response
    {
        return $this->connector->send(new DeleteCertificate($id));
    }
}
