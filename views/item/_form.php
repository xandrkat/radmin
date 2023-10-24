<?php

use xandrkat\radmin\AutocompleteAsset;
use xandrkat\radmin\components\Configs;
use xandrkat\radmin\components\RouteRule;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model xandrkat\radmin\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
/* @var $context xandrkat\radmin\components\ItemController */

$context = $this->context;
$labels  = $context->labels();
$rules   = Configs::authManager()->getRules();
unset($rules[RouteRule::RULE_NAME]);
$source = Json::htmlEncode(array_keys($rules));

$js = <<<JS
    $('#rule_name').autocomplete({
        source: $source,
    })
JS;
AutocompleteAsset::register($this);
$this->registerJs($js);
?>

<div class="auth-item-form">
    <?php $form = ActiveForm::begin(['id' => 'item-form']); ?>
	<div class="row">
		<div class="col-sm-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>
		</div>
		<div class="col-sm-6">
            <?= $form->field($model, 'ruleName')->textInput(['id' => 'rule_name']) ?>

            <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>
		</div>
	</div>
	<div class="form-group">
        <?php
        echo Html::submitButton($model->isNewRecord ? Yii::t('radmin', 'Create') : Yii::t('radmin', 'Update'), [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
            'name'  => 'submit-button'])
        ?>
	</div>

    <?php ActiveForm::end(); ?>
</div>
