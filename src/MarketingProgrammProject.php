<?php

namespace LuzernTourismus\MarketingProgramm;

use Nemundo\Core\Path\Path;
use Nemundo\Project\AbstractProject;

class MarketingProgrammProject extends AbstractProject
{
    public function loadProject()
    {
        $this->project = 'MarketingProgramm';
        $this->projectName = 'marketingprogramm';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;
        $this->modelPath = (new Path())
            ->addPath(__DIR__)
            ->addParentPath()
            ->addPath('model')
            ->getPath();
    }
}