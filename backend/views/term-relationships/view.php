<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TermRelationships */

$this->title = $model->object_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Term Relationships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="term-relationships-view">



    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->object_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->object_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'object_id',
            'term_taxonomy_id',
            'term_order',
        ],
    ]) ?>

</div>
