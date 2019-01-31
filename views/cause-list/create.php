<?php

use yii\helpers\Html;



/* @var $this yii\web\View */
/* @var $model app\models\CauseList */

$this->title = Yii::t('app', 'Create Cause List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cause Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h2><?=Yii::t('app', 'Add Cause List') ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
