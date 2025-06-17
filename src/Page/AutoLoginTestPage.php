<?php

namespace LuzernTourismus\MarketingProgramm\Page;

use LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter\PartnerMitarbeiterReader;
use LuzernTourismus\MarketingProgramm\Parameter\PartnerParameter;
use LuzernTourismus\MarketingProgramm\Site\AutoLoginSite;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Debug\Debug;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Parameter\SecureTokenParameter;

class AutoLoginTestPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $table = new AdminTable($this);

        $partnerMitarbeiterReader = new PartnerMitarbeiterReader();
        foreach ($partnerMitarbeiterReader->getData() as $partnerMitarbeiterRow) {


            $userReader = new UserReader();
            $userReader->filter->andEqual($userReader->model->login, $partnerMitarbeiterRow->email);
            foreach ($userReader->getData() as $userRow) {

            $site = clone(AutoLoginSite::$site);
            //(new Debug())->write($site);

            //$site->addParameter(new PartnerParameter('123'));
            $site->addParameter(new SecureTokenParameter($userRow->secureToken));

            (new AdminTableRow($table))
                ->addText($partnerMitarbeiterRow->email)
                ->addHyperlink($site->getUrlWithDomain());
                //->addText($site->getFullUrl());

            }

        }



        return parent::getContent();
    }
}