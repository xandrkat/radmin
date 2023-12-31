<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \xandrkat\radmin\models\form\ChangePassword */

$this->title                   = Yii::t('radmin', 'Change Password');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>Please fill out the following fields to change password:</p>

	<div class="row">
		<div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-change']); ?>
            <?= $form->field($model, 'oldPassword')->passwordInput() ?>
            <?= $form->field($model, 'newPassword')->passwordInput() ?>
            <?= $form->field($model, 'retypePassword')->passwordInput() ?>
			<div class="form-group">
                <?= Html::submitButton(Yii::t('radmin', 'Change'), ['class' => 'btn btn-primary', 'name' => 'change-button']) ?>
			</div>
            <?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
