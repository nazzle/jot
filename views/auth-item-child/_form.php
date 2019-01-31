<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model app\models\AuthItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-child-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'parent')
        ->dropDownList(
            [ArrayHelper::map(AuthItem::find()->all(), 'name', 'name')],           // Flat array ('id'=>'label')
            ['prompt'=>'Select Parent Authentication']    // options
        ); ?>

     <?= $form->field($model, 'child')
        ->dropDownList(
            [ArrayHelper::map(AuthItem::find()->all(), 'name', 'name')],           // Flat array ('id'=>'label')
            ['prompt'=>'Select Child Authentication']    // options
        ); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
