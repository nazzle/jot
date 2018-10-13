<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserResponses */

$this->title = Yii::t('app', 'Create User Responses');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Responses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-responses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
