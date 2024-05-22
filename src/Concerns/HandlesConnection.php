<?php

namespace DocusealCo\Docuseal\Concerns;

use DocusealCo\Docuseal\APIConnector;
use Saloon\Http\Connector;

trait HandlesConnection
{
    public function getConnector(): Connector
    {
        return new APIConnector();
    }
}
