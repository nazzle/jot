<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Faqs */

$this->title = Yii::t('app', 'Create Faqs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faqs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faqs-create">
	<div class="container">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
