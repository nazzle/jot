<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CauseListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cause-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'dates') ?>

    <?= $form->field($model, 'case_number') ?>

    <?= $form->field($model, 'parties') ?>

    <?= $form->field($model, 'witness') ?>

    <?php // echo $form->field($model, 'advocate_plaintiff') ?>

    <?php // echo $form->field($model, 'advocate_defendant') ?>

    <?php // echo $form->field($model, 'division') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
