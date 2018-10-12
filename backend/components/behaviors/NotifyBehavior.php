<?php

namespace backend\components\behaviors;

use \yii\base\Behavior;
use \backend\components\notifiers\InfoEventInterface;

class NotifyBehavior extends Behavior
{
    private $_size;

    public function getSize()
    {
        return $this->_size;
    }

    public function setSize($size)
    {
        $this->_size = $size;
    }

    public function foo()
    {
        var_dump('I am foo!');
    }

    public function events()
    {
        return [
            InfoEventInterface::EVENT_INFO_INIT => 'beforeInit',
        ];
    }

    public function beforeInit($event)
    {
        var_dump('NotifyBehavior is initizing ..');
    }

    public function isHuge()
    {
        return ($this->_size === 'huge');
    }
}
