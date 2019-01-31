<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\LocationMapping;

/* @var $this yii\web\View */
/* @var $model app\models\Judgments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgments-form">

     <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

     <?= $form->field($model, 'division')
        ->dropDownList(
            [ArrayHelper::map(LocationMapping::find()->all(), 'id', 'location_name')],           // Flat array ('id'=>'label')
            ['prompt'=>'Select Court/Division/Zone']    // options
        ); ?>

    <?= $form->field($model, 'case_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parties')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descriptions')->textarea(['rows' => 6]) ?>

     <?= $form->field($model, 'date_of_decision')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judgment')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
