<?php

namespace DocusealCo\Docuseal\Facades;

use DocusealCo\Docuseal\Models\Submission;
use DocusealCo\Docuseal\Models\Submitter;
use Illuminate\Support\Facades\Facade;

/**
 * @see \DocusealCo\Docuseal\Docuseal
 *
 * @method static Submission submission()
 * @method static Submitter submitters()
 */
class Docuseal extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \DocusealCo\Docuseal\Docuseal::class;
    }
}
