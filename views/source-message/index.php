<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SourceMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Source Messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="source-message-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Source Message'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'category',
            'message:ntext',
            'attachment',
            [
              'attribute' => 'photo',
              'format' => 'image',
              'label' => 'Icon',
              'value' => function ($data) {
              return Html::img(Yii::$app->request->BaseUrl.'/uploads/'.$data['attachment'],
              ['width' => '100']);
             },
             ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>