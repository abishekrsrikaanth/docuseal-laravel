<?php

namespace DocusealCo\Docuseal\Models;

use Spatie\LaravelData\Data;

class Message extends Data
{
    public ?string $subject;

    public ?string $body;
}
