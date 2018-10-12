<?php

namespace backend\components\notifiers;

use backend\components\behaviors\NotifyBehavior;
use yii\base\Component;
use yii\base\Event;

class Info extends Component implements InfoEventInterface
{
    public $msg;
    public $ico;

    private $_color;

    public function behaviors()
    {
        return [
            [
                'class' => NotifyBehavior::className(),
                'size' => 'huge'
            ]
        ];
    }

    public function __construct(array $config = [])
    {
        $this->trigger(InfoEventInterface::EVENT_INFO_INIT);

        parent::__construct($config);

        $this->trigger(InfoEventInterface::EVENT_INFO_READY);
    }

    public function getColor()
    {
        return $this->_color;
    }

    public function setColor($color)
    {
        $this->_color = $color;
    }
}