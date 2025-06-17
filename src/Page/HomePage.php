<?php

namespace LuzernTourismus\MarketingProgramm\Page;

use LuzernTourismus\MarketingProgramm\Com\Form\AutoLoginForm;
use LuzernTourismus\MarketingProgramm\Config\MarketingprogrammConfig;
use LuzernTourismus\MarketingProgramm\Template\MarketingProgrammTemplate;
use Nemundo\Admin\AdminConfig;
use Nemundo\Admin\Com\Layout\Flex\AdminRowFlexLayout;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\UserAction\Widget\LoginWidget;
use Nemundo\Html\Paragraph\Paragraph;

class HomePage extends MarketingProgrammTemplate
{
    public function getContent()
    {

        $this->body->addCssClass('home');

        $twoColumnLayout = new AdminRowFlexLayout($this);

        $widget = new AdminWidget($twoColumnLayout);
        $widget->widgetTitle = AdminConfig::$documentTitle;

        $p = new Paragraph($widget);
        $p->content = 'Informationen über das Marketingprogramm ...';

        $widget = new LoginWidget($twoColumnLayout);
        $widget->showForgotHyperlink = true;


        if (MarketingProgrammConfig::$devMode) {
            $widget = new AdminWidget($twoColumnLayout);
            $widget->widgetTitle = 'Auto Login';
            new AutoLoginForm($widget);
        }


        return parent::getContent();
    }
}