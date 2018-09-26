<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comment_post_id')->textInput() ?>

    <?= $form->field($model, 'comment_author')->textInput() ?>

    <?= $form->field($model, 'comment_author_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment_author_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment_author_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'comment_karma')->textInput() ?>

    <?= $form->field($model, 'comment_approved')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment_agent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment_parent')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
