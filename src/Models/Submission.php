<?php

namespace DocusealCo\Docuseal\Models;

use DateTime;
use DocusealCo\Docuseal\Casts\DateTime as DateTimeCast;
use DocusealCo\Docuseal\Concerns\HandlesConnection;
use DocusealCo\Docuseal\Concerns\HandlesDataFilter;
use DocusealCo\Docuseal\Concerns\OverridesDataObject;
use DocusealCo\Docuseal\Enums\SubmissionOrder;
use DocusealCo\Docuseal\Requests\Submissions\ArchiveSubmission;
use DocusealCo\Docuseal\Requests\Submissions\CreateSubmission;
use DocusealCo\Docuseal\Requests\Submissions\GetSubmission;
use DocusealCo\Docuseal\Requests\Submissions\ListAllSubmissions;
use Illuminate\Support\Arr;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;

class Submission extends Data
{
    use HandlesConnection;
    use HandlesDataFilter;
    use OverridesDataObject;

    public int $id;

    public string $source;

    public bool $send_email = false;

    public bool $send_sms = false;

    public ?string $audit_log_url;

    #[WithCast(EnumCast::class)]
    public SubmissionOrder $submitters_order;

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

    public ?string $completed_redirect_url;

    public ?string $bcc_completed;

    public ?string $reply_to;

    public ?Message $message;

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
        return $this->handleNullData([
            'template_id' => $this->template->id,
            'send_email' => $this->send_email,
            'send_sms' => $this->send_sms,
            'order' => $this->submitters_order->value,
            'completed_redirect_url' => $this->completed_redirect_url,
            'bcc_completed' => $this->bcc_completed,
            'reply_to' => $this->reply_to,
            'message' => $this->message?->toArray() ?? [],
            'submitters' => Arr::map($this->submitters, static fn (Submitter $submitter) => $submitter->toArray()),
        ]);
    }
}
