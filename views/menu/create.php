<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model xandrkat\radmin\models\Menu */

$this->title                   = Yii::t('radmin', 'Create Menu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('radmin', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

	<h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
