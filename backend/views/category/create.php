<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $terms backend\models\Category */
/* @var $taxonomy backend\models\TermTaxonomy $taxonomy */

$this->title = Yii::t('app', 'Create Category');

if ($this->title) {
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="category-create">

    <?= $this->render('_form', [
        'terms' => $terms,
        'taxonomy' => $taxonomy,
    ]) ?>

</div>
