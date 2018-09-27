<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PostTag */

$this->title = Yii::t('app', 'Update Post Tag: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Post Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->term_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="post-tag-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
