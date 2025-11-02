<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\MariaDBEncryptionKeyCreateRequest;
use Cyberfusion\CoreApi\Models\MariadbEncryptionKeysSearchRequest;
use Cyberfusion\CoreApi\Requests\MariaDBEncryptionKeys\CreateMariaDBEncryptionKey;
use Cyberfusion\CoreApi\Requests\MariaDBEncryptionKeys\ListMariaDBEncryptionKeys;
use Cyberfusion\CoreApi\Requests\MariaDBEncryptionKeys\ReadMariaDBEncryptionKey;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class MariaDBEncryptionKeys extends CoreApiResource
{
    public function createMariaDBEncryptionKey(
        MariaDBEncryptionKeyCreateRequest $mariaDBEncryptionKeyCreateRequest,
    ): Response {
        return $this->connector->send(new CreateMariaDBEncryptionKey($mariaDBEncryptionKeyCreateRequest));
    }

    public function listMariaDBEncryptionKeys(
        ?MariadbEncryptionKeysSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListMariaDBEncryptionKeys($includeFilters, $includes));
    }

    public function readMariaDBEncryptionKey(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadMariaDBEncryptionKey($id, $includes));
    }
}
