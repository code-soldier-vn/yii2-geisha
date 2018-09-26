<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Comments */

$this->title = Yii::t('app', 'Create Comments');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
