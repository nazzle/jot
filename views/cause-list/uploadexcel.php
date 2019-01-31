<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CauseList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cause-list-form">
    <div class="container">

    <h2><?= Yii::t('app', 'Upload Cause Lists')?> (<?= Yii::t('app', '* Excel Format')?>)</h2>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'excel')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Upload'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
