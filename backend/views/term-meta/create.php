<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TermMeta */

$this->title = Yii::t('app', 'Create Term Meta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Term Metas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="term-meta-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
