<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\land\models\LandPostsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="land-posts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'attachment') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'descriptions') ?>

    <?= $form->field($model, 'likes') ?>

    <?php // echo $form->field($model, 'dislikes') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'location_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'author') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
