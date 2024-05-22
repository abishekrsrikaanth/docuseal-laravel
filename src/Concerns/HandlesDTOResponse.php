<?php

namespace DocusealCo\Docuseal\Concerns;

use DocusealCo\Docuseal\Models\PaginatedResult;
use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

trait HandlesDTOResponse
{
    /**
     * @param  class-string  $dtoClass
     */
    public function toDTO(array $data, string $dtoClass): Data
    {
        return $dtoClass::from($data);
    }

    /**
     * @param  class-string  $dtoClass
     */
    public function toPaginatedResult(array $paginatedData, string $dtoClass): PaginatedResult
    {
        $data = Arr::get($paginatedData, 'data', []);
        $count = Arr::get($paginatedData, 'pagination.count', 0);
        $next = Arr::get($paginatedData, 'pagination.next', 0);
        $previous = Arr::get($paginatedData, 'pagination.previous', 0);

        if (count($data) === 0) {
            return new PaginatedResult([], $count, $next, $previous);
        }

        return new PaginatedResult($this->toDTOArray($data, $dtoClass), $count, $next, $previous);
    }

    /**
     * @param  class-string  $dtoClass
     */
    public function toDTOArray(array $data, string $dtoClass): array
    {
        return $dtoClass::collect($data);
    }
}
