<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Judgments */

$this->title = Yii::t('app', 'Create Judgments');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Judgments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
