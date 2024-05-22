<?php

namespace DocusealCo\Docuseal\Models;

use DateTime;
use DocusealCo\Docuseal\Casts\DateTime as DateTimeCast;
use DocusealCo\Docuseal\Concerns\HandlesConnection;
use DocusealCo\Docuseal\Requests\Submissions\ArchiveSubmission;
use DocusealCo\Docuseal\Requests\Submissions\CreateSubmission;
use DocusealCo\Docuseal\Requests\Submissions\GetSubmission;
use DocusealCo\Docuseal\Requests\Submissions\ListAllSubmissions;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class Submission extends Data
{
    use HandlesConnection;

    public int $id;

    public string $source;

    public ?string $audit_log_url;

    public string $submitters_order;

    #[WithCast(DateTimeCast::class)]
    public DateTime $created_at;

    #[WithCast(DateTimeCast::class)]
    public DateTime $updated_at;

    #[WithCast(DateTimeCast::class)]
    public ?DateTime $archived_at;

    /** @var Submitter[] */
    public array $submitters;

    public Template $template;

    public User $created_by_user;

    /** @var SubmissionEvent[] */
    public array $submission_events;

    /** @var Document[] */
    public array $documents;

    public string $status;

    #[WithCast(DateTimeCast::class)]
    public ?DateTime $completed_at;

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function get(int $submission_id): Submission
    {
        return $this->getConnector()->send(new GetSubmission($submission_id))->dtoOrFail();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function create(Submission $submission): array
    {
        return $this->getConnector()->send(new CreateSubmission($submission))->dtoOrFail();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function filtered(
        ?int $template_id = null,
        ?string $query = null,
        ?string $template_folder = null,
        int $limit = 10,
        ?int $after = null,
        ?int $before = null
    ): PaginatedResult {
        return $this->getConnector()->send(new ListAllSubmissions($template_id, $query, $template_folder, $limit, $after, $before))->dtoOrFail();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function archive(Submission $submission): Submission
    {
        return $this->getConnector()->send(new ArchiveSubmission($submission))->dtoOrFail();
    }

    public function toCreateSubmissionArray(): array
    {
        return [];
    }
}
