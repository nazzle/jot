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

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
