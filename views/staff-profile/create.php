<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StaffProfile */

$this->title = Yii::t('app', 'Create Staff Profile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Staff Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-profile-create">
	<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

</div>
