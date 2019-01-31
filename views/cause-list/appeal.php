<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CauseListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cause Lists');
?>

<div class="cause-list-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="section section-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?= Yii::t('app', 'COURT OF APPEAL') ?> - <?= Html::encode($this->title) ?></h1>
                    </div>
                </div>
            </div>
        </div>
<div class="container">
    <?php Pjax::begin(['enablePushState'=>false]); ?>
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
           // 'division',
            [
                'attribute'=>'division',
                'value'=>'div.division',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
</div>