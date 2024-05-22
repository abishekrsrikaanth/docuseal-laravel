<?php

namespace DocusealCo\Docuseal;

use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\HeaderAuthenticator;
use Saloon\Http\Connector;

class APIConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        return config('docuseal.api_url');
    }

    protected function defaultAuth(): ?Authenticator
    {
        return new HeaderAuthenticator(config('docuseal.api_token'), 'X-Auth-Token');
    }
}
