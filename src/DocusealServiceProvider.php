<?php

namespace DocusealCo\Docuseal;

use DocusealCo\Docuseal\Docuseal as DocusealClass;
use DocusealCo\Docuseal\Facades\Docuseal as DocusealFacade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DocusealServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('docuseal')
            ->hasConfigFile();
    }

    public function packageBooted(): void
    {
        $this->app->bind(DocusealFacade::class, fn () => new DocusealClass());
    }
}
