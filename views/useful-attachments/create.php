<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UsefulAttachments */

$this->title = Yii::t('app', 'Create Useful Attachments');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Useful Attachments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="useful-attachments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
