<?php

namespace DocusealCo\Docuseal\Casts;

use Carbon\Carbon;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class DateTime implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): ?\DateTime
    {
        return $value ? Carbon::parse($value)->toDateTime() : null;
    }
}
