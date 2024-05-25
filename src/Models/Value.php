<?php

namespace DocusealCo\Docuseal\Models;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Support\Transformation\TransformationContextFactory;

class Value extends Data
{
    public string $field;

    public string $value;

    public function transform(TransformationContext|TransformationContextFactory|null $transformationContext = null): array
    {
        return [$this->field => $this->value];
    }
}
