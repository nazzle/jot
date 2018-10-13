<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Vacancies */

$this->title = Yii::t('app', 'Create Vacancies');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vacancies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
