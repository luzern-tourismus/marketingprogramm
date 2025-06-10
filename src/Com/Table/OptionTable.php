<?php

namespace LuzernTourismus\MarketingProgramm\Com\Table;

use LuzernTourismus\MarketingProgramm\Data\AktivitaetOption\AktivitaetOptionReader;
use LuzernTourismus\MarketingProgramm\Data\Option\OptionReader;
use LuzernTourismus\MarketingProgramm\Parameter\OptionParameter;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungSaveSite;
use LuzernTourismus\MarketingProgramm\Site\AnmeldungSite;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Html\Formatting\Bold;

class OptionTable extends AdminTable
{

    public $aktivitaetId;

    /**
     * @var bool
     */
    public $showAnmeldung=false;

    public function getContent()
    {

        $reader = new OptionReader();

        (new AdminTableHeader($this))
            ->addText($reader->model->option->label)
            ->addText($reader->model->preis->label);


        $reader->filter->andEqual($reader->model->aktivitaetId, $this->aktivitaetId);
        foreach ($reader->getData() as $optionRow) {

            $row = new AdminTableRow($this);

            $row->addText($optionRow->option);
            $row->addText($optionRow->getPreis());

            /*if ($optionRow->hasPreis) {
                $row->addText((new Number( $optionRow->preis))->getFormatNumber().' CHF');
            } else {
                $row->addText('tbd');
            }*/

            $site = clone(AnmeldungSaveSite::$site);
            $site->addParameter(new OptionParameter($optionRow->id));

        }

        $row = new AdminTableRow($this);

        $bold = new Bold($row);
        $bold->content='Total';


        return parent::getContent();

    }

}