<?php

namespace LuzernTourismus\MarketingProgramm\Install;

use LuzernTourismus\MarketingProgramm\Application\MarketingProgrammApplication;
use LuzernTourismus\MarketingProgramm\Business\Aktivitaet\AktivitaetType;
use LuzernTourismus\MarketingProgramm\Business\Kategorie\KategorieType;
use LuzernTourismus\MarketingProgramm\Business\Kontakt\KontaktType;
use LuzernTourismus\MarketingProgramm\Business\Partner\PartnerMitarbeiterType;
use LuzernTourismus\MarketingProgramm\Business\Partner\PartnerType;
use LuzernTourismus\MarketingProgramm\Business\Region\RegionType;
use LuzernTourismus\MarketingProgramm\ChangeLog\Operation\AbstractOperation;
use LuzernTourismus\MarketingProgramm\ChangeLog\Operation\CreateOperation;
use LuzernTourismus\MarketingProgramm\ChangeLog\Operation\DeleteOperation;
use LuzernTourismus\MarketingProgramm\ChangeLog\Operation\UndoDeleteOperation;
use LuzernTourismus\MarketingProgramm\ChangeLog\Operation\UpdateOperation;
use LuzernTourismus\MarketingProgramm\ChangeLog\Setup\BusinessSetup;
use LuzernTourismus\MarketingProgramm\Data\Anrede\Anrede;
use LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation\ChangeLogOperation;
use LuzernTourismus\MarketingProgramm\Data\MarketingProgrammModelCollection;
use LuzernTourismus\MarketingProgramm\Data\Thema\Thema;
use LuzernTourismus\MarketingProgramm\Script\KontaktImportScript;
use LuzernTourismus\MarketingProgramm\Script\PartnerMailScript;
use LuzernTourismus\MarketingProgramm\Type\Anrede\AbstractAnrede;
use LuzernTourismus\MarketingProgramm\Type\Anrede\FrauAnrede;
use LuzernTourismus\MarketingProgramm\Type\Anrede\HerrAnrede;
use LuzernTourismus\MarketingProgramm\Type\Thema\AbstractThema;
use LuzernTourismus\MarketingProgramm\Type\Thema\BasismarketingThema;
use LuzernTourismus\MarketingProgramm\Type\Thema\MarktmanagementThema;
use LuzernTourismus\MarketingProgramm\Type\Thema\TouristInformationThema;
use LuzernTourismus\MarketingProgramm\Usergroup\KontaktUsergroup;
use LuzernTourismus\MarketingProgramm\Usergroup\PartnerUsergroup;
use LuzernTourismus\MarketingProgramm\Usergroup\VerwaltungUsergroup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;

class MarketingProgrammInstall extends AbstractInstall
{
    public function install()
    {
        (new ModelCollectionSetup())->addCollection(new MarketingProgrammModelCollection());

        (new UsergroupSetup())
            ->addUsergroup(new PartnerUsergroup())
            ->addUsergroup(new KontaktUsergroup())
            ->addUsergroup(new VerwaltungUsergroup());

        (new ScriptSetup(new MarketingProgrammApplication()))
            ->addScript(new KontaktImportScript())
            ->addScript(new PartnerMailScript());


        $this
            ->addThema(new TouristInformationThema())
            ->addThema(new BasismarketingThema())
            ->addThema(new MarktmanagementThema());

        $this
            ->addChangeLogOperation(new CreateOperation())
            ->addChangeLogOperation(new UpdateOperation())
            ->addChangeLogOperation(new DeleteOperation())
            ->addChangeLogOperation(new UndoDeleteOperation());

        (new BusinessSetup())
            ->addType(new AktivitaetType())
            ->addType(new KategorieType())
            ->addType(new RegionType())
            ->addType(new KontaktType())
            ->addType(new PartnerType())
            ->addType(new PartnerMitarbeiterType());

        $this
            ->addAnrede(new HerrAnrede())
            ->addAnrede(new FrauAnrede());


    }


    private function addThema(AbstractThema $thema)
    {

        $data = new Thema();
        $data->updateOnDuplicate = true;
        $data->id = $thema->id;
        $data->thema = $thema->thema;
        $data->save();

        return $this;

    }


    private function addChangeLogOperation(AbstractOperation $operation)
    {

        $data = new ChangeLogOperation();
        $data->updateOnDuplicate = true;
        $data->id = $operation->id;
        $data->operation = $operation->operation;
        $data->save();
        return $this;

    }


    private function addAnrede(AbstractAnrede $anrede)
    {

        $data = new Anrede();
        $data->updateOnDuplicate=true;
        $data->id = $anrede->id;
        $data->anrede = $anrede->anrede;
        $data->save();

        return $this;

    }

}