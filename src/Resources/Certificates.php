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

    public function listCertificates(
        ?CertificatesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListCertificates($includeFilters, $includes));
    }

    public function readCertificate(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadCertificate($id, $includes));
    }

    public function deleteCertificate(int $id): Response
    {
        return $this->connector->send(new DeleteCertificate($id));
    }
}
