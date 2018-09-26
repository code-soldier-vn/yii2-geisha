<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TermTaxonomy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="term-taxonomy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'term_id')->textInput() ?>

    <?= $form->field($model, 'taxonomy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'parent')->textInput() ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
