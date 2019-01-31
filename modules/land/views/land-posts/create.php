<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\land\models\LandPosts */

$this->title = Yii::t('app', 'Create Land Posts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Land Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="land-posts-create">
	<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>
