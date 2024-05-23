<?php

namespace DocusealCo\Docuseal\Models;

use DocusealCo\Docuseal\Concerns\OverridesDataObject;
use Spatie\LaravelData\Data;

class Message extends Data
{
    use OverridesDataObject;

    public ?string $subject;

    public ?string $body;
}
