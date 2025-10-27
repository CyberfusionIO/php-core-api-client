<?php

namespace Cyberfusion\CoreApi\Requests\CertificateManagers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * A successful request results in a Certificate object. On the first request, i.e. the certificate manager does not have a certificate ID, the resulting certificate ID is automatically set on domain routers / mail hostnames which have domains that the common names cover. If the certificate ID on a domain router / mail hostname was already manually set, it is not overridden. On later requests, i.e. the certificate manager has a certificate ID, the resulting certificate ID is automatically set on domain routers / mail hostnames which used the previous certificate. If the certificate ID on a domain router / mail hostname was manually updated, it is not overridden. The certificate ID on domain routers / mail hostnames is not updated when the previous certificate was created by a deleted certificate manager, i.e. this is a request of a new certificate manager with the same common name(s) as the deleted one. Prevent this by deleting the previous certificate, as this does not happen when deleting the certificate manager.
 */
class RequestCertificate extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/certificate-managers/%d/request', $this->id);
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
