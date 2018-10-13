<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CauseList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cause-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dates')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'case_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parties')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'witness')->textInput() ?>

    <?= $form->field($model, 'advocate_plaintiff')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'advocate_defendant')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'division')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
