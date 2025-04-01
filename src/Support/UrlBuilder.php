<?php

namespace Cyberfusion\CoreApi\Support;

class UrlBuilder
{
    public function __construct(
        private readonly string $url,
        private array $pathParameters = [],
        private array $queryParameters = [],
        private ?Filter $filter = null,
        private ?Sorter $sorter = null,
    ) {
    }

    public static function for(string $url): self
    {
        return new self($url);
    }

    public function getEndpoint(): string
    {
        $url = sprintf($this->url, ...array_filter($this->pathParameters));

        $queryParameters = array_filter($this->queryParameters);
        if (count($queryParameters) === 0) {
            return $url;
        }

        $endpoint = $url . '?' . http_build_query($queryParameters);

        if ($this->filter !== null) {
            $endpoint .= '&' . $this->filter->toQuery();
        }
        if ($this->sorter !== null) {
            $endpoint .= '&' . $this->sorter->toQuery();
        }

        return $endpoint;
    }

    public function addPathParameter(int|string|null $value): self
    {
        $this->pathParameters[] = $value;

        return $this;
    }

    public function addQueryParameter(string $parameter, mixed $value): self
    {
        $this->queryParameters[$parameter] = $value;

        return $this;
    }

    public function filter(?Filter $filter): self
    {
        if ($filter === null) {
            return $this;
        }

        $this->filter = $filter;

        return $this;
    }

    public function sorter(?Sorter $sorter): self
    {
        if ($sorter === null) {
            return $this;
        }

        $this->sorter = $sorter;

        return $this;
    }
}
