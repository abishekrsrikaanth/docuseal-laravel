<?php

namespace DocusealCo\Docuseal\Models;

use DateTime;
use DocusealCo\Docuseal\Casts\DateTime as DateTimeCast;
use DocusealCo\Docuseal\Concerns\HandlesConnection;
use DocusealCo\Docuseal\Requests\Submitters\GetSubmitter;
use DocusealCo\Docuseal\Requests\Submitters\ListAllSubmitters;
use DocusealCo\Docuseal\Requests\Submitters\UpdateSubmitter;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Submitter extends Data
{
    use HandlesConnection;

    public int $id;

    public int $submission_id;

    public string $uuid;

    public string $email;

    #[MapInputName('ua')]
    public ?string $userAgent;

    public ?string $ip;

    public string $slug;

    #[WithCast(DateTimeCast::class)]
    public ?DateTime $sent_at;

    #[WithCast(DateTimeCast::class)]
    public ?DateTime $opened_at;

    #[WithCast(DateTimeCast::class)]
    public ?DateTime $completed_at;

    #[WithCast(DateTimeCast::class)]
    public DateTime $created_at;

    #[WithCast(DateTimeCast::class)]
    public DateTime $updated_at;

    public string $name;

    public ?string $phone;

    public ?string $external_id;

    public array $metadata;

    public string $status;

    public ?string $application_key;

    /** @var Value[] */
    public array|Optional $values;

    public array $preferences;

    public string $role;

    public string|Optional $embed_src;

    /** @var Document[] */
    public array|Optional $documents;

    public ?string $audit_log_url;

    public ?string $submission_url;

    public Template|Optional $template;

    public Submission|Optional $submission;

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function filtered(
        ?int $submission_id = null,
        ?string $query = null,
        ?string $completed_after = null,
        ?string $completed_before = null,
        ?string $external_id = null,
        int $limit = 10,
        ?int $after = null,
        ?int $before = null
    ): PaginatedResult {
        return $this->getConnector()->send(new ListAllSubmitters($submission_id, $query, $completed_after, $completed_before, $external_id, $limit, $after, $before))->dtoOrFail();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function get(int $submitter_id): self
    {
        return $this->getConnector()->send(new GetSubmitter($submitter_id))->dtoOrFail();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function update(Submitter $submitter): self
    {
        return $this->getConnector()->send(new UpdateSubmitter($submitter))->dtoOrFail();
    }

    public function toUpdateSubmitterArray(): array
    {
        return array_filter($this->toArray());
    }
}
