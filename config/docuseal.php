<?php

// config for Docuseal/Docuseal
return [
    'api_token' => env('DOCUSEAL_API_TOKEN'),
    'base_url' => env('DOCUSEAL_BASE_URL'),
    'api_url' => env('DOCUSEAL_SELF_HOSTED', false) ? 'https://api.docuseal.co' : env('DOCUSEAL_URL').'/api',
    'self_hosted' => env('DOCUSEAL_SELF_HOSTED', false),
];
