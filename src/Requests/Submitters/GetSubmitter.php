<?php

namespace DocusealCo\Docuseal\Requests\Submitters;

use DocusealCo\Docuseal\Concerns\HandlesDTOResponse;
use DocusealCo\Docuseal\Models\Submitter;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Spatie\LaravelData\Data;

class GetSubmitter extends Request implements HasBody
{
    use HandlesDTOResponse;
    use HasJsonBody;

    protected Method $method = Method::GET;

    public function __construct(protected int $submitter_id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/submitters/{$this->submitter_id}";
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): Data
    {
        return $this->toDTO($response->json(), Submitter::class);
    }
}
