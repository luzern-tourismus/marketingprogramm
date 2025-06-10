<?php

namespace LuzernTourismus\MarketingProgramm\Template;

use Nemundo\Admin\Template\NavbarAdminTemplate;
use Nemundo\Html\Script\JavaScript;
use Nemundo\Package\Jquery\Package\JqueryPackage;

class MarketingProgrammTemplate extends NavbarAdminTemplate
{


    protected function loadContainer()
    {

        parent::loadContainer();

        //./ckeditor5/ckeditor5.js

        //http://localhost:49773/package/asset/ckeditor5/ckeditor5.js

        /*$javaScript = new JavaScript();
        $javaScript->type =  'importmap';
        $javaScript->addCodeLine('
			{
				"imports": {
					"ckeditor5": "/package/asset/ckeditor5/ckeditor5.js",
					"ckeditor5/": "/package/asset/ckeditor5/"
				}
			}
		');

        $this->addContainerAtFirst($javaScript);*/

        //$this->head->addContainerAtFirst($javaScript);


        //$this->addPackage(new JqueryPackage());

    }



    public function getContent()
    {

        //$content = parent::getContent();

        //$this->pageTitle = 'Luzern Tourismus | Marketingprogramm';
        return parent::getContent();

    }

}