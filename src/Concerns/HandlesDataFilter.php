<?php

namespace DocusealCo\Docuseal\Concerns;

trait HandlesDataFilter
{
    /**
     * Remove null values from the data array
     */
    public function handleNullData($data): array
    {
        return array_filter($data, fn ($value) => ! is_null($value));
    }
}
