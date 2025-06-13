<?php

namespace LuzernTourismus\MarketingProgramm\Script;

use LuzernTourismus\MarketingProgramm\Business\Partner\PartnerBuilder;
use LuzernTourismus\MarketingProgramm\Business\Partner\PartnerMitarbeiterBuilder;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerCount;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerId;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Debug\Debug;
use Nemundo\Office\Excel\Reader\ExcelReader;
use Nemundo\Project\Path\TmpPath;

class KontaktImportScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'kontakt-import';
    }

    public function run()
    {

        $reader = new ExcelReader();
        $reader->filename = (new TmpPath())
            ->addPath('Kontakte.xlsx')
            ->getFullFilename();

        foreach ($reader->getData() as $kontaktRow) {

            (new Debug())->write($kontaktRow->getValue('firma'));

            $firma = $kontaktRow->getValue('firma');


            $count = new PartnerCount();
            $count->filter->andEqual($count->model->firma, $firma);
            if ($count->getCount() === 0) {

                $builder = new PartnerBuilder();
                $builder->firma = $kontaktRow->getValue('firma');
                $builder->build();

            }

            $id = new PartnerId();
            $id->filter->andEqual($count->model->firma, $firma);
            $partnerId = $id->getId();

            $builder = new PartnerMitarbeiterBuilder();
            $builder->partnerId = $partnerId;
            $builder->nachname = $kontaktRow->getValue('nachname');
            $builder->vorname = $kontaktRow->getValue('vorname');
            $builder->email = $kontaktRow->getValue('e-mail');
            $builder->build();




        }


    }
}