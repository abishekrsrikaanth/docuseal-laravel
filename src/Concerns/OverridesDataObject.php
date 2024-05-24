<?php

namespace DocusealCo\Docuseal\Concerns;

trait OverridesDataObject
{
    use HandlesDataFilter;

    public function toArray(): array
    {
        return $this->handleNullData(parent::toArray());
    }
}
