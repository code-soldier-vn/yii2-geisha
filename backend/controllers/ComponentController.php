<?php

namespace backend\controllers;

use backend\components\notifiers\Info;
use backend\components\notifiers\InfoEventInterface;
use yii\base\Event;
use yii\web\Controller;

class ComponentController extends Controller
{
    /**
     * @throws \yii\base\InvalidConfigException
     */
    function actionIndex()
    {
        try {
            Event::on(Info::className(), InfoEventInterface::EVENT_INFO_INIT, function () {
                var_dump('init');
            });

            Event::on(Info::className(), InfoEventInterface::EVENT_INFO_READY, function () {
                var_dump('ready');
            });

            Event::on(Info::className(), 'component_notifiers_info_*', function () {
                var_dump('Using Wildcard Event');
            });

            $obj = \Yii::createObject([
                'class' => Info::className(),
                'color' => '#FAFAFA'
            ]);

            var_dump($obj->getColor());
            var_dump($obj->getSize());
            var_dump($obj->isHuge());

        } catch (\Exception $e) {

        }
    }
}