<?php

use xandrkat\radmin\components\Configs;
use xandrkat\radmin\components\RouteRule;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel xandrkat\radmin\models\searchs\AuthItem */
/* @var $context xandrkat\radmin\components\ItemController */

$context                       = $this->context;
$labels                        = $context->labels();
$this->title                   = Yii::t('radmin', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Configs::authManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>
<div class="role-index">
	<h1><?= Html::encode($this->title) ?></h1>
	<p>
        <?= Html::a(Yii::t('radmin', 'Create ' . $labels['Item']), ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute' => 'ruleName',
                'label'     => Yii::t('radmin', 'Rule Name'),
                'filter'    => $rules
            ],
            [
                'attribute' => 'description',
                'label'     => Yii::t('radmin', 'Description'),
            ],
            ['class' => 'yii\grid\ActionColumn',],
        ],
    ])
    ?>

</div>
