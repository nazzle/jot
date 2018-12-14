<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsefulAttachments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="useful-attachments-form">
	<div class="container">

	    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

	    <?= $form->field($model, 'category')->dropdownList(['Fees'=>'Fees', 'Attachment'=>'Attachment'], ['prompt'=>'Select Attachment Type']) ?>

	    <?= $form->field($model, 'descriptions')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'file')->fileInput() ?>

	    <div class="form-group">
	        <?= Html::submitButton(Yii::t('app', 'Upload'), ['class' => 'btn btn-success']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>

	</div>

</div>
