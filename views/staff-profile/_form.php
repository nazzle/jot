<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\WhoIsWHo;

/* @var $this yii\web\View */
/* @var $model app\models\StaffProfile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'staff_id')
        ->dropDownList(
            [ArrayHelper::map(WhoIsWHo::find()->all(), 'id', 'name')],           // Flat array ('id'=>'label')
            ['prompt'=>'Select Designation']    // options
        ); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
