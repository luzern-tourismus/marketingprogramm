<?php

namespace LuzernTourismus\MarketingProgramm\Setup;

use LuzernTourismus\MarketingProgramm\Application\MarketingProgrammApplication;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Project\Install\ProjectInstall;
use Nemundo\Project\Reset\ProjectReset;
use Nemundo\Project\Setup\AbstractSetup;
use Nemundo\User\Script\AdminUserScript;

class MarketingProgrammSetup extends AbstractSetup
{
    public function run()
    {
        $reset = new ProjectReset();
        (new ProjectInstall())->install();
        (new ScriptSetup())->addScript(new AdminUserScript());

        (new MarketingProgrammApplication())->installApp();

        $reset->remove();
    }
}