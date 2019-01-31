<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Judgments */

$this->title = Yii::t('app', 'Create Judgments');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Judgments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h2><?= Html::encode($this->title) ?></h2>
    <p style="color: red;">
    	* Make sure to upload the PDF File type
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
