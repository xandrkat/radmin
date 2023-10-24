<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model xandrkat\radmin\models\Menu */

$this->title                   = Yii::t('radmin', 'Update Menu') . ': ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('radmin', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('radmin', 'Update');
?>
<div class="menu-update">

	<h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
