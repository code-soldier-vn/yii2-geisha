<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TermTaxonomy */

$this->title = Yii::t('app', 'Update Term Taxonomy: ' . $model->term_taxonomy_id, [
    'nameAttribute' => '' . $model->term_taxonomy_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Term Taxonomies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->term_taxonomy_id, 'url' => ['view', 'id' => $model->term_taxonomy_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="term-taxonomy-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
