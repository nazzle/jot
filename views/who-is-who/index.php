<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WhoIsWhoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Top Level Staff');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="who-is-who-index">
    <div class="container">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Add Top Staff'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'photo',
           /* array(
            'format' => 'image',
            'value'=>function($data) { return $data->imageurl; },
               ),*/
            [
            'attribute' => 'photo',
            'format' => 'html',    
            'value' => function ($data) {
                return Html::img(Yii::getAlias('@web').'/'. $data['photo'],
                    ['width' => '70px']);
                },
            ],   
            'id',
            'name',
            'position',
            [
                'attribute' => 'posted_by',
                'value' => 'namez.username',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
