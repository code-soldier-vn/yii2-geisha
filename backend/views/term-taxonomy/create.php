<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TermTaxonomy */

$this->title = Yii::t('app', 'Create Term Taxonomy');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Term Taxonomies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="term-taxonomy-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
