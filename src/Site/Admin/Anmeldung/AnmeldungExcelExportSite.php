<?php

namespace LuzernTourismus\MarketingProgramm\Site\Admin\Anmeldung;

use LuzernTourismus\MarketingProgramm\Data\Anmeldung\AnmeldungReader;
use Nemundo\Admin\Site\AbstractExcelSite;
use Nemundo\Office\Excel\Document\ExcelDocument;

class AnmeldungExcelExportSite extends AbstractExcelSite
{

    /**
     * @var AnmeldungExcelExportSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Anmeldung exporten';
        $this->url = 'anmeldung-export';

        AnmeldungExcelExportSite::$site = $this;

    }

    public function loadContent()
    {

        $excel = new ExcelDocument();
        $excel->filename = 'anmeldung-export.xlsx';


        $reader = new AnmeldungReader();
        $reader->model->loadPartner()->loadOption();

        /*
        if ($partner->hasValue()) {
            $reader->filter->andEqual($reader->model->partnerId,$partner->getValue());
        }

        if ($aktivitaet->hasValue()) {
            $reader->filter->andEqual($reader->model->option->aktivitaetId,$aktivitaet->getValue());
        }*/


        $row = [];
        $row[] = $reader->model->partner->label;
        $row[] = $reader->model->option->label;

        $excel->addBoldRow($row);

        foreach ($reader->getData() as $anmeldungRow) {

            $row = [];
            $row[] = $anmeldungRow->partner->firma;
            $row[] = $anmeldungRow->option->option;


        }

        $excel->render();


    }

}