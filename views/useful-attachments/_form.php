<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsefulAttachments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="useful-attachments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descriptions')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attachment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'upload_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
