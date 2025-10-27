<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\CustomerIPAddressCreateRequest;
use Cyberfusion\CoreApi\Models\CustomersSearchRequest;
use Cyberfusion\CoreApi\Requests\Customers\CreateIPAddressForCustomer;
use Cyberfusion\CoreApi\Requests\Customers\DeleteIPAddressForCustomer;
use Cyberfusion\CoreApi\Requests\Customers\GetIPAddressesProductsForCustomers;
use Cyberfusion\CoreApi\Requests\Customers\ListCustomers;
use Cyberfusion\CoreApi\Requests\Customers\ListIPAddressesForCustomer;
use Cyberfusion\CoreApi\Requests\Customers\ReadCustomer;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class Customers extends CoreApiResource
{
    public function listCustomers(?CustomersSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListCustomers($includeFilters));
    }

    public function readCustomer(int $id): Response
    {
        return $this->connector->send(new ReadCustomer($id));
    }

    public function listIPAddressesForCustomer(int $id): Response
    {
        return $this->connector->send(new ListIPAddressesForCustomer($id));
    }

    public function createIPAddressForCustomer(
        int $id,
        CustomerIPAddressCreateRequest $customerIPAddressCreateRequest,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new CreateIPAddressForCustomer($id, $customerIPAddressCreateRequest, $callbackUrl));
    }

    public function deleteIPAddressForCustomer(int $id, string $ipAddress, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new DeleteIPAddressForCustomer($id, $ipAddress, $callbackUrl));
    }

    public function getIPAddressesProductsForCustomers(string $baseUrl): Response
    {
        return $this->connector->send(new GetIPAddressesProductsForCustomers($baseUrl));
    }
}
