<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TermMeta */

$this->title = Yii::t('app', 'Update Term Meta: ' . $model->meta_id, [
    'nameAttribute' => '' . $model->meta_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Term Metas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->meta_id, 'url' => ['view', 'id' => $model->meta_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="term-meta-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
