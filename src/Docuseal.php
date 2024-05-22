<?php

namespace DocusealCo\Docuseal;

use DocusealCo\Docuseal\Models\Submission;
use DocusealCo\Docuseal\Models\Submitter;

class Docuseal
{
    public function submission(): Submission
    {
        return new Submission();
    }

    public function submitters(): Submitter
    {
        return new Submitter();
    }
}
