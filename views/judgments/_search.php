<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JudgmentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'division') ?>

    <?= $form->field($model, 'case_no') ?>

    <?= $form->field($model, 'parties') ?>

    <?= $form->field($model, 'descriptions') ?>

    <?php // echo $form->field($model, 'attachment') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
