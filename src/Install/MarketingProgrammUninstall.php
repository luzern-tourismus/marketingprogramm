<?php
namespace LuzernTourismus\MarketingProgramm\Install;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use LuzernTourismus\MarketingProgramm\Data\MarketingProgrammModelCollection;
use LuzernTourismus\MarketingProgramm\Application\MarketingProgrammApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class MarketingProgrammUninstall extends AbstractUninstall {
public function uninstall() {
(new ModelCollectionSetup())->removeCollection(new MarketingProgrammModelCollection());
}
}