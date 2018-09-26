<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserMeta */

$this->title = Yii::t('app', 'Create User Meta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Metas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-meta-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
