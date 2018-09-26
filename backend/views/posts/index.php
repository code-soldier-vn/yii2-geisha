<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Posts'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'post_author',
            'post_date',
            'post_date_gmt',
            'post_content:ntext',
            //'post_title:ntext',
            //'post_excerpt:ntext',
            //'post_status',
            //'comment_status',
            //'post_password',
            //'post_name',
            //'post_modified',
            //'post_modified_gmt',
            //'post_content_filtered:ntext',
            //'post_parent',
            //'guid',
            //'menu_order',
            //'post_type',
            //'post_mime_type',
            //'comment_count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
