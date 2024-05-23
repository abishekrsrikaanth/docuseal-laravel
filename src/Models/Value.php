<?php

namespace DocusealCo\Docuseal\Models;

use Spatie\LaravelData\Data;

class Value extends Data
{
    public string $field;

    public string $value;

    public function toArray(): array
    {
        return [$this->field => $this->value];
    }
}
