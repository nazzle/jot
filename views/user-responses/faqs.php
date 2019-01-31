<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Collapse;
use app\models\Faqs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CauseListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Frequently Asked Questions');
?>
<div class="cause-list-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <!-- Page Title -->
        <div class="section section-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?= Yii::t('app', 'Frequently Asked Questions'); ?></h1>
                    </div>
                </div>
            </div>
        </div>

         <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 faq-wrapper">
                        <div class="panel-group" id="accordion2">
                            <h3><?= Yii::t('app', 'Questions with respective answers underneath'); ?></h3>

                            <?php
                            $faqs = Faqs::find()->all();
                                if(!empty($faqs))
                                {
                                    foreach($faqs as $faq)
                                    {
                                   echo Collapse::widget([
                                        'items' => [
                                            [
                                                'label' => $faq['question'],
                                                'content' => $faq['answer'],
                                                'contentOptions' => [],
                                                'options' => [],
                                            ],
                                        ]
                                    ]);
                                 }
                             }      

                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>


</div>
