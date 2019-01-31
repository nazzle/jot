<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\JudiciaryDesignations;
use app\models\LocationMapping;

/* @var $this yii\web\View */
/* @var $model app\models\JudicialStaffs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judicial-staffs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'designation')
        ->dropDownList(
            [ArrayHelper::map(JudiciaryDesignations::find()->all(), 'id', 'name')],           // Flat array ('id'=>'label')
            ['prompt'=>'Select Designation']    // options
        ); ?>

     <?= $form->field($model, 'current_place')
        ->dropDownList(
            [ArrayHelper::map(LocationMapping::find()->all(), 'id', 'location_name')],           // Flat array ('id'=>'label')
            ['prompt'=>'Select Current Place/Court']    // options
        ); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
