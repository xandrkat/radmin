<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model xandrkat\radmin\models\AuthItem */
/* @var $context xandrkat\radmin\components\ItemController */

$context                       = $this->context;
$labels                        = $context->labels();
$this->title                   = Yii::t('radmin', 'Update ' . $labels['Item']) . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('radmin', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('radmin', 'Update');
?>
<div class="auth-item-update">
	<h1><?= Html::encode($this->title) ?></h1>
    <?=
    $this->render('_form', [
        'model' => $model,
    ]);
    ?>
</div>
