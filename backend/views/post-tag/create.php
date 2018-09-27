<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $tag backend\models\PostTag */
/* @var $taxonomy backend\models\TermTaxonomy */

$this->title = Yii::t('app', 'Create Post Tag');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Post Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-tag-create">

    <?= $this->render('_form', [
        'tag' => $tag,
        'taxonomy' => $taxonomy,
    ]) ?>

</div>
