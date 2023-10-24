<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this  yii\web\View */
/* @var $model xandrkat\radmin\models\BizRule */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel xandrkat\radmin\models\searchs\BizRule */

$this->title                   = Yii::t('radmin', 'Rules');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
        <?= Html::a(Yii::t('radmin', 'Create Rule'), ['create'], ['class' => 'btn btn-success']) ?>
	</p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'label'     => Yii::t('radmin', 'Name'),
            ],
            ['class' => 'yii\grid\ActionColumn',],
        ],
    ]);
    ?>

</div>
