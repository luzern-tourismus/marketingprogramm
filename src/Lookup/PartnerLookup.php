<?php

namespace LuzernTourismus\MarketingProgramm\Lookup;

use LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter\PartnerMitarbeiterReader;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Session\UserSession;

class PartnerLookup extends AbstractBase
{

    private static $partnerRow;


    public function getPartnerId()
    {

        $partnerId = null;

        $partnerRow = $this->getPartnerRow();
        if ($partnerRow !== null) {
            $partnerId = $partnerRow->id;
        }

        return $partnerId;

    }


    public function isAnmeldungFinalisiert()
    {

        $value = null;
        $partnerRow = $this->getPartnerRow();
        if ($partnerRow !== null) {
            $value = $this->getPartnerRow()->anmeldungFinalisiert;
        }

        return $value;

    }


    public function getPartnerRow()
    {

        if (PartnerLookup::$partnerRow == null) {

            $partnerMitarbeiterReader = new PartnerMitarbeiterReader();
            $partnerMitarbeiterReader->model->loadPartner();
            $partnerMitarbeiterReader->filter->andEqual($partnerMitarbeiterReader->model->email, (new UserSession())->login);

            foreach ($partnerMitarbeiterReader->getData() as $partnerMitarbeiterRow) {

                PartnerLookup::$partnerRow = $partnerMitarbeiterRow->partner;

            }
        }

        return PartnerLookup::$partnerRow;

    }

}