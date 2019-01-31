<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JudgmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Judgments');
?>
   <div class="section section-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?= Yii::t('app', 'HIGH COURT') ?> - <?= Html::encode($this->title) ?></h1>
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

            'case_no',
            'parties',
            'descriptions:ntext',
            'attachment',
        ],
    ]); ?>
</div>
