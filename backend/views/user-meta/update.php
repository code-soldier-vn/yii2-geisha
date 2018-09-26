<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserMeta */

$this->title = Yii::t('app', 'Update User Meta: ' . $model->meta_id, [
    'nameAttribute' => '' . $model->meta_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Metas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->meta_id, 'url' => ['view', 'id' => $model->meta_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-meta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
