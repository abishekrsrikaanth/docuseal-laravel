<?php

namespace DocusealCo\Docuseal\Models;

use DocusealCo\Docuseal\Concerns\OverridesDataObject;
use Spatie\LaravelData\Data;

class Field extends Data
{
    use OverridesDataObject;

    public string $name;

    public string $default_value;

    public ?string $validation_pattern;

    public ?string $invalid_message;

    public bool $readonly = false;
}
