<?php

namespace LuzernTourismus\MarketingProgramm\Application;

use LuzernTourismus\MarketingProgramm\Data\MarketingProgrammModelCollection;
use LuzernTourismus\MarketingProgramm\Install\MarketingProgrammInstall;
use LuzernTourismus\MarketingProgramm\Install\MarketingProgrammUninstall;
use Nemundo\App\Application\Type\AbstractApplication;

class MarketingProgrammApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'MarketingProgramm';
        $this->applicationId = 'dd25ecab-187c-440f-96a2-d4c710375659';
        $this->modelCollectionClass = MarketingProgrammModelCollection::class;
        $this->installClass = MarketingProgrammInstall::class;
        $this->uninstallClass = MarketingProgrammUninstall::class;
    }
}