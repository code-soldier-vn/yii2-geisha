<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $tag backend\models\PostTag */
/* @var $form yii\widgets\ActiveForm */
/* @var $taxonomy backend\models\TermTaxonomy */
?>

<div class="post-tag-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($tag, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($tag, 'slug')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
