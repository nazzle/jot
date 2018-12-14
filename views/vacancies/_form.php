<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vacancies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duties')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'PART-TIME' => 'PART-TIME', 'FULL-TIME' => 'FULL-TIME', ], ['prompt' => 'Select job type']) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'how_to_apply')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'posted_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '<span class="fa fa-reply"></span> Publish'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
