<?php

namespace DocusealCo\Docuseal\Requests\Submitters;

use DocusealCo\Docuseal\Concerns\HandlesDTOResponse;
use DocusealCo\Docuseal\Models\PaginatedResult;
use DocusealCo\Docuseal\Models\Submitter;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class ListAllSubmitters extends Request implements HasBody
{
    use HandlesDTOResponse;
    use HasJsonBody;

    public function __construct(protected ?int $submission_id = null,
        protected ?string $filterQuery = null,
        protected ?string $completed_after = null,
        protected ?string $completed_before = null,
        protected ?string $external_id = null,
        protected int $limit = 10,
        protected ?int $after = null,
        protected ?int $before = null
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/submitters';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): PaginatedResult
    {
        return $this->toPaginatedResult($response->json(), Submitter::class);
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'submission_id' => $this->submission_id,
            'q' => $this->filterQuery,
            'completed_after' => $this->completed_after,
            'completed_before' => $this->completed_before,
            'external_id' => $this->external_id,
            'limit' => $this->limit,
            'after' => $this->after,
            'before' => $this->before,
        ]);
    }
}
