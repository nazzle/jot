<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Divisions */

$this->title = Yii::t('app', 'Create Divisions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Divisions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="divisions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
