<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TermRelationships */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="term-relationships-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'term_taxonomy_id')->textInput() ?>

    <?= $form->field($model, 'term_order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
