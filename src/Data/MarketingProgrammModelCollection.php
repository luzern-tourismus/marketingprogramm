<?php
namespace LuzernTourismus\MarketingProgramm\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class MarketingProgrammModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \LuzernTourismus\MarketingProgramm\Data\Aktivitaet\AktivitaetModel());
$this->addModel(new \LuzernTourismus\MarketingProgramm\Data\AktivitaetChangeLog\AktivitaetChangeLogModel());
$this->addModel(new \LuzernTourismus\MarketingProgramm\Data\Anmeldung\AnmeldungModel());
$this->addModel(new \LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogModel());
$this->addModel(new \LuzernTourismus\MarketingProgramm\Data\ChangeLogOperation\ChangeLogOperationModel());
$this->addModel(new \LuzernTourismus\MarketingProgramm\Data\ChangeLogType\ChangeLogTypeModel());
$this->addModel(new \LuzernTourismus\MarketingProgramm\Data\Kategorie\KategorieModel());
$this->addModel(new \LuzernTourismus\MarketingProgramm\Data\KategorieLog\KategorieLogModel());
$this->addModel(new \LuzernTourismus\MarketingProgramm\Data\Kontakt\KontaktModel());
$this->addModel(new \LuzernTourismus\MarketingProgramm\Data\KontaktLog\KontaktLogModel());
$this->addModel(new \LuzernTourismus\MarketingProgramm\Data\Option\OptionModel());
$this->addModel(new \LuzernTourismus\MarketingProgramm\Data\Partner\PartnerModel());
$this->addModel(new \LuzernTourismus\MarketingProgramm\Data\PartnerMitarbeiter\PartnerMitarbeiterModel());
$this->addModel(new \LuzernTourismus\MarketingProgramm\Data\Thema\ThemaModel());
}
}