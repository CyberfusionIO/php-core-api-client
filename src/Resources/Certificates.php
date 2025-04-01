<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\CertificateCreateRequest;
use Cyberfusion\CoreApi\Requests\Certificates\CreateCertificate;
use Cyberfusion\CoreApi\Requests\Certificates\DeleteCertificate;
use Cyberfusion\CoreApi\Requests\Certificates\ListCertificates;
use Cyberfusion\CoreApi\Requests\Certificates\ReadCertificate;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class Certificates extends BaseResource
{
    public function createCertificate(CertificateCreateRequest $certificateCreateRequest): Response
    {
        return $this->connector->send(new CreateCertificate($certificateCreateRequest));
    }

    public function listCertificates(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListCertificates($skip, $limit, $filter, $sort));
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
