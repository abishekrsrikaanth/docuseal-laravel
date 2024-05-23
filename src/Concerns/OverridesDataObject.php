<?php

namespace DocusealCo\Docuseal\Concerns;

trait OverridesDataObject
{
    public function toArray(): array
    {
        return $this->handleNullData(parent::toArray());
    }
}
