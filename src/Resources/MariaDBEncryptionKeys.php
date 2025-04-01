<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\MariaDBEncryptionKeyCreateRequest;
use Cyberfusion\CoreApi\Requests\MariaDBEncryptionKeys\CreateMariaDBEncryptionKey;
use Cyberfusion\CoreApi\Requests\MariaDBEncryptionKeys\ListMariaDBEncryptionKeys;
use Cyberfusion\CoreApi\Requests\MariaDBEncryptionKeys\ReadMariaDBEncryptionKey;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class MariaDBEncryptionKeys extends BaseResource
{
    public function createMariaDBEncryptionKey(
        MariaDBEncryptionKeyCreateRequest $mariaDBEncryptionKeyCreateRequest,
    ): Response {
        return $this->connector->send(new CreateMariaDBEncryptionKey($mariaDBEncryptionKeyCreateRequest));
    }

    public function listMariaDBEncryptionKeys(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListMariaDBEncryptionKeys($skip, $limit, $filter, $sort));
    }

    public function readMariaDBEncryptionKey(int $id): Response
    {
        return $this->connector->send(new ReadMariaDBEncryptionKey($id));
    }
}
