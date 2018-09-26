<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Terms */

$this->title = Yii::t('app', 'Update Terms: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Terms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->term_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="terms-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
