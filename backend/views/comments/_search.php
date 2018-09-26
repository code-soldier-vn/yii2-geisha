<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CommentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'comment_id') ?>

    <?= $form->field($model, 'comment_post_id') ?>

    <?= $form->field($model, 'comment_author') ?>

    <?= $form->field($model, 'comment_author_email') ?>

    <?= $form->field($model, 'comment_author_url') ?>

    <?php // echo $form->field($model, 'comment_author_ip') ?>

    <?php // echo $form->field($model, 'comment_content') ?>

    <?php // echo $form->field($model, 'comment_karma') ?>

    <?php // echo $form->field($model, 'comment_approved') ?>

    <?php // echo $form->field($model, 'comment_agent') ?>

    <?php // echo $form->field($model, 'comment_type') ?>

    <?php // echo $form->field($model, 'comment_parent') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
