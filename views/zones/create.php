<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Zones */

$this->title = Yii::t('app', 'Create Zones');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Zones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
