<?php

namespace DocusealCo\Docuseal\Requests\Submissions;

use DocusealCo\Docuseal\Concerns\HandlesDTOResponse;
use DocusealCo\Docuseal\Models\PaginatedResult;
use DocusealCo\Docuseal\Models\Submission;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class ListAllSubmissions extends Request implements HasBody
{
    use HandlesDTOResponse;
    use HasJsonBody;

    protected Method $method = Method::GET;

    public function __construct(
        protected ?int $template_id = null,
        protected ?string $filterQuery = null,
        protected ?string $template_folder = null,
        protected ?int $limit = null,
        protected ?int $after = null,
        protected ?int $before = null)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/submissions';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): PaginatedResult
    {
        return $this->toPaginatedResult($response->json(), Submission::class);
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'template_id' => $this->template_id,
            'q' => $this->filterQuery,
            'template_folder' => $this->template_folder,
            'limit' => $this->limit,
            'after' => $this->after,
            'before' => $this->before,
        ]);
    }
}
