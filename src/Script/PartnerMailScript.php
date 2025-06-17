<?php

namespace LuzernTourismus\MarketingProgramm\Script;

use LuzernTourismus\MarketingProgramm\Business\Partner\PartnerBuilder;
use LuzernTourismus\MarketingProgramm\Business\Partner\PartnerMitarbeiterBuilder;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerCount;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerId;
use LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter\PartnerMitarbeiterReader;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Debug\Debug;
use Nemundo\Office\Excel\Reader\ExcelReader;
use Nemundo\Project\Path\TmpPath;

class PartnerMailScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'partner-mail';
    }

    public function run()
    {



        $reader = new PartnerMitarbeiterReader();
        foreach ($reader->getData() as $partnerMitarbeiterRow) {


            (new Debug())->write($partnerMitarbeiterRow->email);


        }




    }
}