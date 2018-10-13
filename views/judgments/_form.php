<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Judgments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'division')->textInput() ?>

    <?= $form->field($model, 'case_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parties')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descriptions')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'attachment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
