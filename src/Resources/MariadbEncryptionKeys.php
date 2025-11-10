<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\MariadbEncryptionKeyCreateRequest;
use Cyberfusion\CoreApi\Models\MariadbEncryptionKeysSearchRequest;
use Cyberfusion\CoreApi\Requests\MariadbEncryptionKeys\CreateMariadbEncryptionKey;
use Cyberfusion\CoreApi\Requests\MariadbEncryptionKeys\ListMariadbEncryptionKeys;
use Cyberfusion\CoreApi\Requests\MariadbEncryptionKeys\ReadMariadbEncryptionKey;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class MariadbEncryptionKeys extends CoreApiResource
{
    public function createMariadbEncryptionKey(
        MariadbEncryptionKeyCreateRequest $mariadbEncryptionKeyCreateRequest,
    ): Response {
        return $this->connector->send(new CreateMariadbEncryptionKey($mariadbEncryptionKeyCreateRequest));
    }

    public function listMariadbEncryptionKeys(
        ?MariadbEncryptionKeysSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListMariadbEncryptionKeys($includeFilters, $includes));
    }

    public function readMariadbEncryptionKey(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadMariadbEncryptionKey($id, $includes));
    }
}
