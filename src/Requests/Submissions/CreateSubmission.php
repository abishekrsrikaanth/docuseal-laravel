<?php

namespace DocusealCo\Docuseal\Requests\Submissions;

use DocusealCo\Docuseal\Concerns\HandlesDTOResponse;
use DocusealCo\Docuseal\Models\Submission;
use DocusealCo\Docuseal\Models\Submitter;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateSubmission extends Request implements HasBody
{
    use HandlesDTOResponse;
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected Submission $submission)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/submissions';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): array
    {
        return $this->toDTOArray($response->json(), Submitter::class);
    }

    protected function defaultBody(): array
    {
        return $this->submission->toCreateSubmissionArray();
    }
}
