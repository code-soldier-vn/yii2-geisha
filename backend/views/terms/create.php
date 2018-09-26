<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Terms */

$this->title = Yii::t('app', 'Create Terms');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Terms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terms-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
