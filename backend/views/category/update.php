<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $terms backend\models\Category */
/* @var $taxonomy backend\models\TermTaxonomy $taxonomy*/

$this->title = Yii::t('app', 'Update Category: ' . $terms->name, [
    'nameAttribute' => '' . $terms->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $terms->name, 'url' => ['view', 'id' => $terms->term_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="category-update">



    <?= $this->render('_form', [
        'terms' => $terms,
        'taxonomy' => $taxonomy,
    ]) ?>

</div>
