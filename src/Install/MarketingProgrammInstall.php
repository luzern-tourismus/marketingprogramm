<?php

namespace LuzernTourismus\MarketingProgramm\Install;

use LuzernTourismus\MarketingProgramm\Data\MarketingProgrammModelCollection;
use LuzernTourismus\MarketingProgramm\Data\Thema\Thema;
use LuzernTourismus\MarketingProgramm\Type\Thema\AbstractThema;
use LuzernTourismus\MarketingProgramm\Type\Thema\BasismarketingThema;
use LuzernTourismus\MarketingProgramm\Type\Thema\MarktmanagementThema;
use LuzernTourismus\MarketingProgramm\Usergroup\PartnerUsergroup;
use LuzernTourismus\MarketingProgramm\Usergroup\VerwaltungUsergroup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;

class MarketingProgrammInstall extends AbstractInstall
{
    public function install()
    {
        (new ModelCollectionSetup())->addCollection(new MarketingProgrammModelCollection());

        (new UsergroupSetup())
            ->addUsergroup(new PartnerUsergroup())
            ->addUsergroup(new VerwaltungUsergroup());

        $this
            ->addThema(new BasismarketingThema())
            ->addThema(new MarktmanagementThema());

    }


    public function addThema(AbstractThema $thema)
    {

        $data = new Thema();
        $data->updateOnDuplicate = true;
        $data->id = $thema->id;
        $data->thema = $thema->thema;
        $data->save();

        return $this;

    }


}