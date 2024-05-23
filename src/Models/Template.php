<?php

namespace DocusealCo\Docuseal\Models;

use DateTime;
use DocusealCo\Docuseal\Casts\DateTime as DateTimeCast;
use DocusealCo\Docuseal\Concerns\OverridesDataObject;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class Template extends Data
{
    use OverridesDataObject;

    public int $id;

    public string $name;

    public ?string $external_id;

    public string $folder_name;

    #[WithCast(DateTimeCast::class)]
    public DateTime $created_at;

    #[WithCast(DateTimeCast::class)]
    public DateTime $updated_at;
}
