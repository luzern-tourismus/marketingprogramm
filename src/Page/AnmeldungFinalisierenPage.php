<?php

namespace LuzernTourismus\MarketingProgramm\Page;

use LuzernTourismus\MarketingProgramm\Data\Partner\PartnerUpdate;
use LuzernTourismus\MarketingProgramm\Lookup\PartnerLookup;
use LuzernTourismus\MarketingProgramm\Parameter\PartnerParameter;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Html\Paragraph\Paragraph;

class AnmeldungFinalisierenPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $update = new PartnerUpdate();
        $update->anmeldungFinalisiert=true;
        $update->updateById((new PartnerLookup())->getPartnerId());

        $p = new Paragraph($layout);
        $p->content = 'Anmeldung wurde finalisiert.';


        return parent::getContent();
    }
}