<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UsefulAttachments */

$this->title = Yii::t('app', 'Add New Attachment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Useful Attachments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h2><?= Html::encode($this->title) ?></h2>
    <p style="color: red;">
    	* You can not submit empty form.
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
