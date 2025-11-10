<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\CustomerIpAddressCreateRequest;
use Cyberfusion\CoreApi\Models\CustomersSearchRequest;
use Cyberfusion\CoreApi\Requests\Customers\CreateIpAddressForCustomer;
use Cyberfusion\CoreApi\Requests\Customers\DeleteIpAddressForCustomer;
use Cyberfusion\CoreApi\Requests\Customers\GetIpAddressesProductsForCustomers;
use Cyberfusion\CoreApi\Requests\Customers\ListCustomers;
use Cyberfusion\CoreApi\Requests\Customers\ListIpAddressesForCustomer;
use Cyberfusion\CoreApi\Requests\Customers\ReadCustomer;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class Customers extends CoreApiResource
{
    public function listCustomers(?CustomersSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListCustomers($includeFilters, $includes));
    }

    public function readCustomer(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadCustomer($id, $includes));
    }

    public function listIpAddressesForCustomer(int $id): Response
    {
        return $this->connector->send(new ListIpAddressesForCustomer($id));
    }

    public function createIpAddressForCustomer(
        int $id,
        CustomerIpAddressCreateRequest $customerIpAddressCreateRequest,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new CreateIpAddressForCustomer($id, $customerIpAddressCreateRequest, $callbackUrl));
    }

    public function deleteIpAddressForCustomer(int $id, string $ipAddress, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new DeleteIpAddressForCustomer($id, $ipAddress, $callbackUrl));
    }

    public function getIpAddressesProductsForCustomers(): Response
    {
        return $this->connector->send(new GetIpAddressesProductsForCustomers());
    }
}
