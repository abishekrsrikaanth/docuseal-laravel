<?php

namespace DocusealCo\Docuseal\Models;

class PaginatedResult
{
    public function __construct(protected array $data, protected int $count, protected int $next, protected int $previous)
    {
    }

    public function results(): array
    {
        return $this->data;
    }

    public function count(): int
    {
        return $this->count;
    }

    public function next(): int
    {
        return $this->next;
    }

    public function previous(): int
    {
        return $this->previous;
    }
}
