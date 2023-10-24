<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \xandrkat\radmin\models\form\PasswordResetRequest */

$this->title                   = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>Please fill out your email. A link to reset password will be sent there.</p>

	<div class="row">
		<div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
            <?= $form->field($model, 'email') ?>
			<div class="form-group">
                <?= Html::submitButton(Yii::t('radmin', 'Send'), ['class' => 'btn btn-primary']) ?>
			</div>
            <?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
