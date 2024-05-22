<?php

namespace DocusealCo\Docuseal\Models;

use DateTime;
use DocusealCo\Docuseal\Casts\DateTime as DateTimeCast;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class SubmissionEvent extends Data
{
    public int $id;

    public int $submitter_id;

    public string $event_type;

    #[WithCast(DateTimeCast::class)]
    public DateTime $event_timestamp;
}
