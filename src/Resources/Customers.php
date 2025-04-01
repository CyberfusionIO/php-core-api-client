<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\CustomerIPAddressCreateRequest;
use Cyberfusion\CoreApi\Requests\Customers\CreateIPAddressForCustomer;
use Cyberfusion\CoreApi\Requests\Customers\DeleteIPAddressForCustomer;
use Cyberfusion\CoreApi\Requests\Customers\GetIPAddressesProductsForCustomers;
use Cyberfusion\CoreApi\Requests\Customers\ListCustomers;
use Cyberfusion\CoreApi\Requests\Customers\ListIPAddressesForCustomer;
use Cyberfusion\CoreApi\Requests\Customers\ReadCustomer;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class Customers extends BaseResource
{
    public function listCustomers(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListCustomers($skip, $limit, $filter, $sort));
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
    ): Response {
        return $this->connector->send(new CreateIPAddressForCustomer($id, $customerIPAddressCreateRequest));
    }

    public function deleteIPAddressForCustomer(int $id, string $ipAddress): Response
    {
        return $this->connector->send(new DeleteIPAddressForCustomer($id, $ipAddress));
    }

    public function getIPAddressesProductsForCustomers(string $baseUrl): Response
    {
        return $this->connector->send(new GetIPAddressesProductsForCustomers($baseUrl));
    }
}
