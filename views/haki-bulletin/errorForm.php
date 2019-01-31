<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HakiBulletin */

$this->title = Yii::t('app', 'Add New HakiBulletin');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Haki Bulletins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="haki-bulletin-create">
	<div class="container">

    <h2><?= Html::encode($this->title) ?></h2>
    <p style="color: red;">
    	* You can not submit empty form <br>
    	* Make sure to upload proper file formats (i.e .JPG for poster and .PDF for Document)
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
