<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TermRelationships */

$this->title = Yii::t('app', 'Update Term Relationships: ' . $model->object_id, [
    'nameAttribute' => '' . $model->object_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Term Relationships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->object_id, 'url' => ['view', 'id' => $model->object_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="term-relationships-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
