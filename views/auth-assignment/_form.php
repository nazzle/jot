<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;
use app\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model app\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')
        ->dropDownList(
            [ArrayHelper::map(User::find()->all(), 'id', 'username')],           // Flat array ('id'=>'label')
            ['prompt'=>'Select User']    // options
        ); ?>

    <?= $form->field($model, 'item_name')
        ->dropDownList(
            [ArrayHelper::map(AuthItem::find()->all(), 'name', 'name')],           // Flat array ('id'=>'label')
            ['prompt'=>'Select Authentication']    // options
        ); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
