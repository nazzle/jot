<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JudiciaryDesignations */

$this->title = Yii::t('app', 'Create Judiciary Designations');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Judiciary Designations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judiciary-designations-create">
	<div class="container">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
