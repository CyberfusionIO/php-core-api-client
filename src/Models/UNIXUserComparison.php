<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class UNIXUserComparison extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

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
        return $this->getAttribute('not_identical_paths');
    }

    public function setNotIdenticalPaths(NestedPathsDict $notIdenticalPaths): self
    {
        $this->setAttribute('not_identical_paths', $notIdenticalPaths);
        return $this;
    }

    public function getOnlyLeftFilesPaths(): NestedPathsDict
    {
        return $this->getAttribute('only_left_files_paths');
    }

    public function setOnlyLeftFilesPaths(NestedPathsDict $onlyLeftFilesPaths): self
    {
        $this->setAttribute('only_left_files_paths', $onlyLeftFilesPaths);
        return $this;
    }

    public function getOnlyRightFilesPaths(): NestedPathsDict
    {
        return $this->getAttribute('only_right_files_paths');
    }

    public function setOnlyRightFilesPaths(NestedPathsDict $onlyRightFilesPaths): self
    {
        $this->setAttribute('only_right_files_paths', $onlyRightFilesPaths);
        return $this;
    }

    public function getOnlyLeftDirectoriesPaths(): NestedPathsDict
    {
        return $this->getAttribute('only_left_directories_paths');
    }

    public function setOnlyLeftDirectoriesPaths(NestedPathsDict $onlyLeftDirectoriesPaths): self
    {
        $this->setAttribute('only_left_directories_paths', $onlyLeftDirectoriesPaths);
        return $this;
    }

    public function getOnlyRightDirectoriesPaths(): NestedPathsDict
    {
        return $this->getAttribute('only_right_directories_paths');
    }

    public function setOnlyRightDirectoriesPaths(NestedPathsDict $onlyRightDirectoriesPaths): self
    {
        $this->setAttribute('only_right_directories_paths', $onlyRightDirectoriesPaths);
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
