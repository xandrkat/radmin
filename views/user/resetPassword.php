<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \xandrkat\radmin\models\form\ResetPassword */

$this->title                   = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>Please choose your new password:</p>

	<div class="row">
		<div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'retypePassword')->passwordInput() ?>
			<div class="form-group">
                <?= Html::submitButton(Yii::t('radmin', 'Save'), ['class' => 'btn btn-primary']) ?>
			</div>
            <?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
