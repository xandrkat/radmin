<?php

use yii\helpers\Html;

/* @var $this  yii\web\View */
/* @var $model xandrkat\radmin\models\BizRule */

$this->title                   = Yii::t('radmin', 'Create Rule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('radmin', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">

	<h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ]);
    ?>

</div>
