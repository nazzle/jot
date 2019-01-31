<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Announcements */

$this->title = Yii::t('app', 'Create Announcements');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Announcements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="announcements-create">
	<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>
    <p style="color: red;">
    	* You can not submitt an empty form. <br>
    	* Make sure the uploaded file corresponds the type selected.
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>
