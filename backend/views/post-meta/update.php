<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PostMeta */

$this->title = Yii::t('app', 'Update Post Meta: ' . $model->meta_id, [
    'nameAttribute' => '' . $model->meta_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Post Metas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->meta_id, 'url' => ['view', 'id' => $model->meta_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="post-meta-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
