<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\FileInput

/* @var $this yii\web\View */
/* @var $model app\models\Announcements */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="announcements-form">

     <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'type')->dropDownList([ 'With Attachment' => 'With Attachment', 'With Poster' => 'With Poster', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'file')->fileInput() ?>
    <?= FileInput::widget([
    'name' => 'file', 
    'options' => ['multiple' => true], 
    'pluginOptions' => ['previewFileType' => 'any']
	]);?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
