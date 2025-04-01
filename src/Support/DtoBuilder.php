<?php

namespace Cyberfusion\CoreApi\Support;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\ValidationError;
use Illuminate\Support\Collection;
use InvalidArgumentException;
use JsonException;
use Saloon\Http\Response;

class DtoBuilder
{
    /**
     * @param class-string $dtoClass
     */
    public function __construct(
        private readonly Response $response,
        private readonly string $dtoClass,
    ) {
        if (! is_subclass_of($this->dtoClass, CoreApiModelContract::class)) {
            throw new InvalidArgumentException('DTO class must implement CoreApiModelContract');
        }
    }

    public static function for(Response $response, string $dtoClass): self
    {
        return new self(
            response: $response,
            dtoClass: $dtoClass,
        );
    }

    private function toResource(array $data): mixed
    {
        return match($this->response->status()) {
            200 => $this->dtoClass::fromArray($data),
            422 => ValidationError::fromArray($data),
            default => DetailMessage::fromArray($data),
        };
    }

    /**
     * @throws JsonException
     */
    private function getCollectionItems(): array
    {
        return match ($this->response->status()) {
            422 => $this->response->json('detail'),
            default => $this->response->json(),
        };
    }

    /**
     * @return Collection
     * @throws JsonException
     */
    public function buildCollection(): Collection
    {
        return collect($this->getCollectionItems())->map(fn (array $item) => $this->toResource($item));
    }

    /**
     * @throws JsonException
     */
    public function build(): mixed
    {
        if ($this->response->status() === 422) {
            return $this->buildCollection();
        }

        return $this->toResource($this->response->json());
    }
}
