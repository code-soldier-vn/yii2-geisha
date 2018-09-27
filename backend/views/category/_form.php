<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $terms backend\models\Category */
/* @var $taxonomy backend\models\TermTaxonomy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($terms, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($terms, 'slug')->textInput(['maxlength' => true]) ?>

    <?php
    $options = new \backend\components\grid\terms\column\data\TermsAsTree($terms, $taxonomy);
    $data = $options->getData();

    echo $form->field($taxonomy, 'parent')->dropDownList($data);
    ?>

    <?= $form->field($taxonomy, 'description')->widget(CKEditor::className(), ['options' => ['rows' => 6], 'preset' => 'standard']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
