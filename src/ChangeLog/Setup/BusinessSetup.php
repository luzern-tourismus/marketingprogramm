<?php

namespace LuzernTourismus\MarketingProgramm\ChangeLog\Setup;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBusinessType;
use LuzernTourismus\MarketingProgramm\Data\ChangeLogType\ChangeLogType;
use Nemundo\Core\Base\AbstractBase;

class BusinessSetup extends AbstractBase
{

    public function addType(AbstractBusinessType $type)
    {

        $data = new ChangeLogType();
        $data->updateOnDuplicate = true;
        $data->phpClass = $type->getClassName();
        $data->changeLogType = $type->businessType;
        $data->save();

        return $this;

    }

}