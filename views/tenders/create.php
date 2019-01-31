<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tenders */

$this->title = Yii::t('app', 'New Tender');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tenders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenders-create">
	<div class="container">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

</div>
