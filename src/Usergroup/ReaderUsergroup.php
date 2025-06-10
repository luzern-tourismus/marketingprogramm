<?php
namespace LuzernTourismus\MarketingProgramm\Usergroup;
use Nemundo\User\Usergroup\AbstractUsergroup;
class ReaderUsergroup extends AbstractUsergroup {
protected function loadUsergroup() {
$this->usergroup = 'Reader';
$this->usergroupId = '618aa5b0-35bb-4c12-8f73-b6b75bd0ab3a';
}
}