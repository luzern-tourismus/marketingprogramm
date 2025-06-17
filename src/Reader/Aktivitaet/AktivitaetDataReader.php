<?php

namespace LuzernTourismus\MarketingProgramm\Reader\Aktivitaet;

use LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetReader;
use Nemundo\Core\Check\ValueCheck;

class AktivitaetDataReader extends AktivitaetReader
{

    public function __construct()
    {

        parent::__construct();

        $this->model->loadKategorie()->loadKontakt();
        $this->model->kategorie->loadThema()->loadRegion();

    }


    public function filterByThema($themaId)
    {
        if ((new ValueCheck())->hasValue($themaId)) {
            $this->filter->andEqual($this->model->kategorieId, $themaId);
        }
        return $this;
    }



    public function filterByKategorie($kategorieId)
    {
        if ((new ValueCheck())->hasValue($kategorieId)) {
            $this->filter->andEqual($this->model->kategorieId, $kategorieId);
        }
        return $this;
    }


    public function filterByKontakt($kontaktId)
    {
        if ((new ValueCheck())->hasValue($kontaktId)) {
            $this->filter->andEqual($this->model->kontaktId, $kontaktId);
        }
        return $this;
    }



    public function orderByAktivitaet()
    {

        $this->addOrder($this->model->aktivitaet);
        return $this;

    }

}