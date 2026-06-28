<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodejsVersionResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $majorRelease,
        int $minorRelease,
        int $pointRelease,
        NodejsVersionIncludes $includes,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setMajorRelease($majorRelease);
        $this->setMinorRelease($minorRelease);
        $this->setPointRelease($pointRelease);
        $this->setIncludes($includes);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(int $id): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getMajorRelease(): int
    {
        return $this->getAttribute('major_release');
    }

    public function setMajorRelease(int $majorRelease): self
    {
        $this->setAttribute('major_release', $majorRelease);
        return $this;
    }

    public function getMinorRelease(): int
    {
        return $this->getAttribute('minor_release');
    }

    public function setMinorRelease(int $minorRelease): self
    {
        $this->setAttribute('minor_release', $minorRelease);
        return $this;
    }

    public function getPointRelease(): int
    {
        return $this->getAttribute('point_release');
    }

    public function setPointRelease(int $pointRelease): self
    {
        $this->setAttribute('point_release', $pointRelease);
        return $this;
    }

    public function getIncludes(): NodejsVersionIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(NodejsVersionIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            majorRelease: Arr::get($data, 'major_release'),
            minorRelease: Arr::get($data, 'minor_release'),
            pointRelease: Arr::get($data, 'point_release'),
            includes: NodejsVersionIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
