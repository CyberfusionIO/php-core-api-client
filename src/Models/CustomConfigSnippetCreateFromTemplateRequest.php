<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\CustomConfigSnippetTemplateNameEnum;
use Cyberfusion\CoreApi\Enums\VirtualHostServerSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CustomConfigSnippetCreateFromTemplateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $name,
        VirtualHostServerSoftwareNameEnum $serverSoftwareName,
        int $clusterId,
        bool $isDefault,
        CustomConfigSnippetTemplateNameEnum $templateName,
    ) {
        $this->setName($name);
        $this->setServerSoftwareName($serverSoftwareName);
        $this->setClusterId($clusterId);
        $this->setIsDefault($isDefault);
        $this->setTemplateName($templateName);
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(?string $name = null): self
    {
        Validator::create()
            ->length(min: 1, max: 128)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getServerSoftwareName(): VirtualHostServerSoftwareNameEnum
    {
        return $this->getAttribute('server_software_name');
    }

    public function setServerSoftwareName(?VirtualHostServerSoftwareNameEnum $serverSoftwareName = null): self
    {
        $this->setAttribute('server_software_name', $serverSoftwareName);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getIsDefault(): bool
    {
        return $this->getAttribute('is_default');
    }

    public function setIsDefault(?bool $isDefault = null): self
    {
        $this->setAttribute('is_default', $isDefault);
        return $this;
    }

    public function getTemplateName(): CustomConfigSnippetTemplateNameEnum
    {
        return $this->getAttribute('template_name');
    }

    public function setTemplateName(?CustomConfigSnippetTemplateNameEnum $templateName = null): self
    {
        $this->setAttribute('template_name', $templateName);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            serverSoftwareName: VirtualHostServerSoftwareNameEnum::tryFrom(Arr::get($data, 'server_software_name')),
            clusterId: Arr::get($data, 'cluster_id'),
            isDefault: Arr::get($data, 'is_default'),
            templateName: CustomConfigSnippetTemplateNameEnum::tryFrom(Arr::get($data, 'template_name')),
        ));
    }
}
