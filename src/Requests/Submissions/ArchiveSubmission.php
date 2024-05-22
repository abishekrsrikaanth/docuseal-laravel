<?php

namespace DocusealCo\Docuseal\Requests\Submissions;

use DocusealCo\Docuseal\Concerns\HandlesDTOResponse;
use DocusealCo\Docuseal\Models\Submission;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Spatie\LaravelData\Data;

class ArchiveSubmission extends Request implements HasBody
{
    use HandlesDTOResponse;
    use HasJsonBody;

    protected Method $method = Method::DELETE;

    public function __construct(protected Submission $submission)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/submissions/{$this->submission->id}";
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): Data
    {
        return $this->toDTO($response->json(), Submission::class);
    }
}
