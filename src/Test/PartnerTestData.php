<?php

namespace LuzernTourismus\MarketingProgramm\Test;

use LuzernTourismus\MarketingProgramm\Application\MarketingProgrammApplication;
use LuzernTourismus\MarketingProgramm\Business\Kategorie\KategorieBuilder;
use LuzernTourismus\MarketingProgramm\Business\Partner\PartnerBuilder;
use LuzernTourismus\MarketingProgramm\Business\Partner\PartnerMitarbeiterBuilder;
use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerReader;
use LuzernTourismus\MarketingProgramm\Type\Thema\AbstractThema;
use LuzernTourismus\MarketingProgramm\Type\Thema\BasismarketingThema;
use LuzernTourismus\MarketingProgramm\Type\Thema\MarktmanagementThema;
use LuzernTourismus\MarketingProgramm\Usergroup\PartnerUsergroup;
use LuzernTourismus\MarketingProgramm\Usergroup\VerwaltungUsergroup;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Project\Path\SourcePath;
use Nemundo\User\Builder\UserBuilder;

class PartnerTestData extends AbstractBase
{

    public function createTestData()
    {

        $filename = (new SourcePath())
            ->addPath('Partner.txt')
            ->getFullFilename();

        foreach ((new TextFileReader($filename))->getData() as $line) {

            $builder = new PartnerBuilder();
            $builder->firma = $line;
            $builder->strasse = 'Teststr. 1';
            $builder->plz = '6000';
            $builder->ort = 'Luzern';
            $builder->build();

        }

    }


}