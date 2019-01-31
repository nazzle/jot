<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\land\models\LandComments */

$this->title = Yii::t('app', 'Create Land Comments');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Land Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="land-comments-create">
	<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
