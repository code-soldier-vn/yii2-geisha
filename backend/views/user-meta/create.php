<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserMeta */

$this->title = Yii::t('app', 'Create User Meta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Metas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-meta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
