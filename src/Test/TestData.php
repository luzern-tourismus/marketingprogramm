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
use function Symfony\Component\String\b;

class TestData extends AbstractBase
{

    public function createTestData()
    {


        (new MarketingProgrammApplication())->reinstallApp();


        $builder = new UserBuilder();
        $builder->email = 'admin@luzern.com';
        $builder->createUser();
        $builder->addUsergroup(new PartnerUsergroup())->addUsergroup(new VerwaltungUsergroup());



        $loop = new ForLoop();
        $loop->minNumber = 1;
        $loop->maxNumber = 20;
        foreach ($loop->getData() as $number) {

            /*$builder = new KategorieBuilder();
            $builder->kategorie = 'Kategorie ' . $number;
            $builder->themaId = (new BasismarketingThema())->id;
            $builder->build();*/


            /*$builder = new PartnerBuilder();
            $builder->firma = 'Partner ' . $number;
            $builder->build();*/

        }







        $this
            ->importKategorie(new MarktmanagementThema())
            ->importKategorie(new BasismarketingThema());


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



        $partnerReader = new PartnerReader();
        foreach ($partnerReader->getData() as $partnerRow) {

            $builder = new PartnerMitarbeiterBuilder();
            $builder->nachname = 'ma';

            $builder->email = 'ma'.$partnerRow->id.'@'.(new Text($partnerRow->firma))->remove(' ')->changeToLowercase()->getValue().'.com';
            $builder->partnerId = $partnerRow->id;
            $builder->build();


        }



    }



    private function importKategorie(AbstractThema $thema)
    {

        $filename = (new SourcePath())
            ->addPath($thema->thema.'.txt')
            ->getFullFilename();

        foreach ((new TextFileReader($filename))->getData() as $line) {

            $builder = new KategorieBuilder();
            $builder->kategorie = $line;
            $builder->themaId = $thema->id;
            $builder->build();

        }

        return $this;

    }


}