<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Options */

$this->title = Yii::t('app', 'Update Options: ' . $model->option_id, [
    'nameAttribute' => '' . $model->option_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Options'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->option_id, 'url' => ['view', 'id' => $model->option_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="options-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
