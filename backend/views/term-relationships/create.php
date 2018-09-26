<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TermRelationships */

$this->title = Yii::t('app', 'Create Term Relationships');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Term Relationships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="term-relationships-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
