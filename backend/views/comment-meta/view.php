<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CommentMeta */

$this->title = $model->meta_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comment Metas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-meta-view">



    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->meta_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->meta_id], [
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
            'meta_id',
            'content_id',
            'meta_key',
            'meta_value:ntext',
        ],
    ]) ?>

</div>
