<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CauseListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cause Lists');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cause-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cause List'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'dates',
            'case_number',
            'parties',
            'witness',
            //'advocate_plaintiff',
            //'advocate_defendant',
            //'division',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
