<?php

namespace LuzernTourismus\MarketingProgramm\Page\Admin\ChangeLog;

use LuzernTourismus\MarketingProgramm\Business\Base\AbstractBusinessType;
use LuzernTourismus\MarketingProgramm\ChangeLog\Com\AbstractLogView;
use LuzernTourismus\MarketingProgramm\ChangeLog\Com\ListBox\ChangeLogTypeListBox;
use LuzernTourismus\MarketingProgramm\Com\ListBox\OperationListBox;
use LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogReader;
use LuzernTourismus\MarketingProgramm\Data\ChangeLogType\ChangeLogType;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\User\Com\ListBox\UserListBox;

class ChangeLogPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = 'Change Log';

        $search = new AdminSearchForm($layout);

        $type = new ChangeLogTypeListBox($search);
        $type->searchMode=true;
        $type->submitOnChange=true;

        $operation = new OperationListBox($search);
        $operation->searchMode=true;
        $operation->submitOnChange=true;

        $user = new UserListBox($search);
        $user->searchMode=true;
        $user->submitOnChange=true;


        $table = new AdminTable($layout);

        $reader = new ChangeLogReader();
        $reader->model->loadUser()->loadOperation()->loadChangeLogType();

        if ($type->hasValue()) {
            $reader->filter->andEqual($reader->model->changeLogTypeId,$type->getValue());
        }

        if ($operation->hasValue()) {
            $reader->filter->andEqual($reader->model->operationId,$operation->getValue());
        }

        if ($user->hasValue()) {
            $reader->filter->andEqual($reader->model->userId,$user->getValue());
        }



        $reader->addOrder($reader->model->id,SortOrder::DESCENDING);

        (new AdminTableHeader($table))
            ->addText($reader->model->changeLogType->label)
            ->addText($reader->model->operation->label)
            ->addText('Change Log')
            ->addText($reader->model->dateTime->label)
            ->addText($reader->model->user->label)
            //->addText($reader->model->dataId->label)


        ;


        foreach ($reader->getData() as $changeLogRow) {

            $row = new AdminTableRow($table);

            $row
                ->addText($changeLogRow->changeLogType->changeLogType)
                ->addText($changeLogRow->operation->operation);

            $className = $changeLogRow->changeLogType->phpClass;

            /** @var AbstractBusinessType $type */
            $type = new $className();

            /** @var AbstractLogView $view */
            $view = new $type->logView($row);
            $view->logId= $changeLogRow->id;


            $row
                ->addText($changeLogRow->dateTime->getShortDateTimeLeadingZeroFormat())
                ->addText($changeLogRow->user->login)
                //->addText($changeLogRow->dataId)

                ;






        }




        return parent::getContent();
    }
}