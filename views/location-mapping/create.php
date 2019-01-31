<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LocationMapping */

$this->title = Yii::t('app', 'Create Location Mapping');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Location Mappings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-mapping-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
