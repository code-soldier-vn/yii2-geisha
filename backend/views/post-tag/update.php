<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $tag backend\models\PostTag */
/* @var $taxonomy backend\models\TermTaxonomy */

$this->title = Yii::t('app', 'Update Post Tag: ' . $tag->name, [
    'nameAttribute' => '' . $tag->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Post Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $tag->name, 'url' => ['view', 'id' => $tag->term_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="post-tag-update">
    
    <?= $this->render('_form', [
        'tag' => $tag,
        'taxonomy' => $taxonomy,
    ]) ?>

</div>
