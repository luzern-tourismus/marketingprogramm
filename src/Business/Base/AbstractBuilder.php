<?php

namespace LuzernTourismus\MarketingProgramm\Business\Base;

use LuzernTourismus\MarketingProgramm\ChangeLog\Operation\AbstractOperation;
use LuzernTourismus\MarketingProgramm\ChangeLog\Operation\CreateOperation;
use LuzernTourismus\MarketingProgramm\ChangeLog\Operation\DeleteOperation;
use LuzernTourismus\MarketingProgramm\ChangeLog\Operation\UndoDeleteOperation;
use LuzernTourismus\MarketingProgramm\ChangeLog\Operation\UpdateOperation;
use LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLog;
use LuzernTourismus\MarketingProgramm\Data\ChangeLog\ChangeLogUpdate;
use LuzernTourismus\MarketingProgramm\Data\ChangeLogType\ChangeLogType;
use LuzernTourismus\MarketingProgramm\Data\ChangeLogType\ChangeLogTypeId;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\User\Session\UserSession;

// AbstractBusinessBuilder
abstract class AbstractBuilder extends AbstractBase
{

    protected $id;

    protected $logId;


    /**
     * @var AbstractOperation
     */
    protected $operation;

    /**
     * @var AbstractBusinessType
     */
    protected $type;


    public function __construct($id = null)
    {
        $this->id = $id;
        $this->loadBuilder();
    }

    //abstract public function create();


    abstract protected function loadBuilder();



    public function build()
    {

        $this->onCheck();

        if ($this->id == null) {
            $this->operation = new CreateOperation();
        } else {
            $this->operation = new UpdateOperation();
        }

        $this->saveChangeLog();


        if ($this->id == null) {
            $this->onCreate();
        } else {
            $this->onUpdate();
        }

        $this->updateDataId();

    }


    public function delete()
    {

        $this->operation = new DeleteOperation();
        $this->saveChangeLog();

        $this->onDelete();

    }


    public function undoDelete()
    {

        $this->operation = new UndoDeleteOperation();
        $this->saveChangeLog();

        $this->onUndoDelete();

    }




    protected function onCheck()
    {

    }


    protected function onCreate()
    {

    }

    protected function onUpdate()
    {

    }


    protected function onDelete()
    {

    }


    protected function onUndoDelete()
    {

    }


    protected function saveChangeLog()
    {


        // operation:
        // create, edit, delete


        $id = new ChangeLogTypeId();
        $id->filter->andEqual($id->model->phpClass,$this->type->getClassName());
        $changeLogId = $id->getId();


        $data = new ChangeLog();
        $data->dateTime = (new DateTime())->setNow();

        if ((new UserSession())->isUserLogged()) {
        $data->userId = (new UserSession())->userId;
        } else {
            $data->userId = 0;
        }


        $data->changeLogTypeId = $changeLogId;  // 0;

        if ($this->id == null) {
        $data->dataId = 0;  // $this->id;
        } else {
            $data->dataId = $this->id;
        }

        $data->operationId = $this->operation->id;
        $this->logId = $data->save();

        //return $id;

    }



    private function updateDataId()
    {

        $update = new ChangeLogUpdate();
        $update->dataId=$this->id;
        $update->updateById($this->logId);

    }




}