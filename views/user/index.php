<?php

use xandrkat\radmin\components\Helper;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel xandrkat\radmin\models\searchs\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('radmin', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

	<h1><?= Html::encode($this->title) ?></h1>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'email:email',
            [
                'attribute' => 'status',
                'value'     => function ($model) {
                    return $model->status == 0 ? 'Inactive' : 'Active';
                },
                'filter'    => [
                    0  => 'Inactive',
                    10 => 'Active'
                ]
            ],
            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn(['view', 'activate', 'delete']),
                'buttons'  => [
                    'activate' => function ($url, $model) {
                        if ($model->status == 10) {
                            return '';
                        }
                        $options = [
                            'title'        => Yii::t('radmin', 'Activate'),
                            'aria-label'   => Yii::t('radmin', 'Activate'),
                            'data-confirm' => Yii::t('radmin', 'Are you sure you want to activate this user?'),
                            'data-method'  => 'post',
                            'data-pjax'    => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, $options);
                    }
                ]
            ],
        ],
    ]);
    ?>
</div>
