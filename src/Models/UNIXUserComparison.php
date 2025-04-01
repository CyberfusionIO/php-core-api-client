<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class UNIXUserComparison extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        NestedPathsDict $notIdenticalPaths,
        NestedPathsDict $onlyLeftFilesPaths,
        NestedPathsDict $onlyRightFilesPaths,
        NestedPathsDict $onlyLeftDirectoriesPaths,
        NestedPathsDict $onlyRightDirectoriesPaths,
    ) {
        $this->setNotIdenticalPaths($notIdenticalPaths);
        $this->setOnlyLeftFilesPaths($onlyLeftFilesPaths);
        $this->setOnlyRightFilesPaths($onlyRightFilesPaths);
        $this->setOnlyLeftDirectoriesPaths($onlyLeftDirectoriesPaths);
        $this->setOnlyRightDirectoriesPaths($onlyRightDirectoriesPaths);
    }

    public function getNotIdenticalPaths(): NestedPathsDict
    {
        return $this->getAttribute('notIdenticalPaths');
    }

    public function setNotIdenticalPaths(?NestedPathsDict $notIdenticalPaths = null): self
    {
        $this->setAttribute('notIdenticalPaths', $notIdenticalPaths);
        return $this;
    }

    public function getOnlyLeftFilesPaths(): NestedPathsDict
    {
        return $this->getAttribute('onlyLeftFilesPaths');
    }

    public function setOnlyLeftFilesPaths(?NestedPathsDict $onlyLeftFilesPaths = null): self
    {
        $this->setAttribute('onlyLeftFilesPaths', $onlyLeftFilesPaths);
        return $this;
    }

    public function getOnlyRightFilesPaths(): NestedPathsDict
    {
        return $this->getAttribute('onlyRightFilesPaths');
    }

    public function setOnlyRightFilesPaths(?NestedPathsDict $onlyRightFilesPaths = null): self
    {
        $this->setAttribute('onlyRightFilesPaths', $onlyRightFilesPaths);
        return $this;
    }

    public function getOnlyLeftDirectoriesPaths(): NestedPathsDict
    {
        return $this->getAttribute('onlyLeftDirectoriesPaths');
    }

    public function setOnlyLeftDirectoriesPaths(?NestedPathsDict $onlyLeftDirectoriesPaths = null): self
    {
        $this->setAttribute('onlyLeftDirectoriesPaths', $onlyLeftDirectoriesPaths);
        return $this;
    }

    public function getOnlyRightDirectoriesPaths(): NestedPathsDict
    {
        return $this->getAttribute('onlyRightDirectoriesPaths');
    }

    public function setOnlyRightDirectoriesPaths(?NestedPathsDict $onlyRightDirectoriesPaths = null): self
    {
        $this->setAttribute('onlyRightDirectoriesPaths', $onlyRightDirectoriesPaths);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            notIdenticalPaths: NestedPathsDict::fromArray(Arr::get($data, 'not_identical_paths')),
            onlyLeftFilesPaths: NestedPathsDict::fromArray(Arr::get($data, 'only_left_files_paths')),
            onlyRightFilesPaths: NestedPathsDict::fromArray(Arr::get($data, 'only_right_files_paths')),
            onlyLeftDirectoriesPaths: NestedPathsDict::fromArray(Arr::get($data, 'only_left_directories_paths')),
            onlyRightDirectoriesPaths: NestedPathsDict::fromArray(Arr::get($data, 'only_right_directories_paths')),
        ));
    }
}
