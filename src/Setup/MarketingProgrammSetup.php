<?php

namespace LuzernTourismus\MarketingProgramm\Setup;

use LuzernTourismus\MarketingProgramm\Application\MarketingProgrammApplication;
use Nemundo\App\Mail\Setup\MailServerSetup;
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

        $setup = new MailServerSetup();
        $setup->host ='mail.cyon.ch';
        $setup->port = 465;
        $setup->user = 'noreply@marketingprogramm.luzern.com';
        $setup->password = 'CmL{bKV6(YpM{$M';
        $setup->mailAddress =  'noreply@marketingprogramm.luzern.com';
        $setup->mailText='Marketingprogramm Luzern Tourismus';
        $setup->save();

        $reset->remove();
    }
}