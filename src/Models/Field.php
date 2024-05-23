<?php

namespace DocusealCo\Docuseal\Models;

use Spatie\LaravelData\Data;

class Field extends Data
{
    public string $name;

    public string $default_value;

    public ?string $validation_pattern;

    public ?string $invalid_message;

    public bool $readonly = false;
}
