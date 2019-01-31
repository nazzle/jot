<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="container">
    <h2><?= Html::encode($this->title) ?></h2>
    <p>
        <?= Html::a(Yii::t('app', 'Publish Posts/Stories'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            [
            'attribute' => 'attachment',
            'format' => 'html',    
            'value' => function ($data) {
                return Html::img(Yii::getAlias('@web').'/'. $data['attachment'],
                    ['width' => '70px']);
                },
            ],   
            'title',
            'descriptions:ntext',
            'time',
            //'author',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>
