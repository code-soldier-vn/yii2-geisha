<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $terms backend\models\Category */
/* @var $taxonomy backend\models\TermTaxonomy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($terms, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($terms, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($taxonomy, 'parent')->textInput() ?>

    <?= $form->field($taxonomy, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
