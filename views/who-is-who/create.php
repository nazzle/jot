<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WhoIsWho */

$this->title = Yii::t('app', 'Top Level Staff Form');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Who Is Whos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="who-is-who-create">
	<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
