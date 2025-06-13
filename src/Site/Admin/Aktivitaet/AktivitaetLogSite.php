<?php
namespace LuzernTourismus\MarketingProgramm\Site\Admin\Aktivitaet;
use LuzernTourismus\MarketingProgramm\Page\Admin\Aktivitaet\AktivitaetLogPage;
use Nemundo\Web\Site\AbstractSite;

class AktivitaetLogSite extends AbstractSite {
protected function loadSite() {
$this->title = 'AktivitaetLog';
$this->url = 'AktivitaetLog';
}
public function loadContent() {
(new AktivitaetLogPage())->render();
}
}