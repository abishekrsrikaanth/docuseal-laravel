<?php

namespace DocusealCo\Docuseal\Concerns;

trait HandlesDataFilter
{
    /**
     * Remove null values from the data array
     */
    public function handleNullData(array $data): array
    {
        return array_filter(
            $data,
            fn ($value, $key) => (! is_null($value) && ! (is_array($value) && empty($value))),
            ARRAY_FILTER_USE_BOTH
        );
    }
}
