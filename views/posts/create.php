<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = Yii::t('app', 'Create Posts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
