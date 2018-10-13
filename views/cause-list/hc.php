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

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="section section-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?= Yii::t('app', 'HIGH COURT MAIN REGISTRY') ?> - <?= Html::encode($this->title) ?></h1>
                    </div>
                </div>
            </div>
        </div>
<div class="container">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'dates',
            'case_number',
            'parties',
            'witness',
            'advocate_plaintiff',
            'advocate_defendant',
            'division',
        ],
    ]); ?>
</div>
</div>