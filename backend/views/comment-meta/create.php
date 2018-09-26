<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CommentMeta */

$this->title = Yii::t('app', 'Create Comment Meta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comment Metas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-meta-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
