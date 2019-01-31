<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Comments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Comments'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){
            if($model->status == 2){
                return ['class' => 'success'];
            }else {
               return ['class' => 'danger']; 
           }
          },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'post_id',
                'value' => 'postid.title',
            ],
            'username',
            'comment:ntext',

            [
        'class' => 'yii\grid\ActionColumn',
        'header'=>'Approve',       
        'template' => '{update}',
        'buttons' => [
                'update' => function ($id, $model) {
                                    return Html::a(
                                            '<span class="fa fa-check-square-o"> </span>' 
                                               ,Url::to(['comments/approve','id'=>$model->id]));      
                             },                
                         ],
                     ],  

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Delete',
                'template' => '{delete}',
        ],
        ],
    ]); ?>
</div>
