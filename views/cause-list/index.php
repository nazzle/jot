<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CauseListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cause Lists');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cause List'), ['create'], ['class' => 'btn btn-success']) ?> 
        <?= Html::button('Upload Cause Lists (Excel)', ['value' => Url::to('index.php?r=cause-list/uploadexcel'), 'class' => 'btn btn-success', 'id' =>'modalButton']) ?>
    </p>
    <?php
        Modal::begin([
                'header' => '<h4> Uploading Cause Lists </h4>',
                'id' => 'modal',
                'size' => 'modal-lg', 
                'options'=> [
                    'data-backdrop'=>'static',
                    //'data-keyboard'=>'false',
                ],
               ]);
               echo "<div id='modalContent'></div>";
               
           Modal::end();    
    ?>    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dates',
            'case_number',
            'parties',
            'witness',
            'advocate_plaintiff',
            'advocate_defendant',
            'division',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
