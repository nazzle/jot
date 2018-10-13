<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JudgmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Judgments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgments-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <!-- Page Title -->
        <div class="section section-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?= Yii::t('app', 'Judgments'); ?></h1>
                    </div>
                </div>
            </div>
        </div>

         <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 faq-wrapper">
                        <div class="panel-group" id="accordion2">
                            <h3><?= Yii::t('app', 'Courts'); ?></h3>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse11">
                                        <?= Yii::t('app', 'COURT OF APPEAL'); ?>
                                    </a>
                                </div>
                                <div id="collapse11" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <div class="answer"><?= Yii::t('app', 'Uploads'); ?>:</div>
                                        <p><a href="#"><?= Yii::t('app', 'Judgments'); ?></a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse12">
                                        <?= Yii::t('app', 'HIGH COURT MAIN REGISTRY'); ?>
                                    </a>
                                </div>
                                <div id="collapse12" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <div class="answer"><?= Yii::t('app', 'Uploads'); ?>:</div>
                                        <p><a href="#"><?= Yii::t('app', 'Judgments'); ?></a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse13">
                                        <?= Yii::t('app', 'HIGH COURT ZONES'); ?>
                                    </a>
                                </div>
                                <div id="collapse13" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <div class="answer"><?= Yii::t('app', 'Zones'); ?>:</div>
                                        <p><a href="#">Dar es Salaam</a></p>
                                        <p><a href="#">Bukoba</a></p>
                                        <p><a href="#">Tanga</a></p>
                                        <p><a href="#">Mbeya</a></p>
                                        <p><a href="#">Arusha</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse14">
                                       <?= Yii::t('app', 'HIGH COURT DIVISIONS'); ?>
                                    </a>
                                </div>
                                <div id="collapse14" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <div class="answer"><?= Yii::t('app', 'Divisions'); ?>:</div>
                                        <p><a href="#"><?= Yii::t('app', 'Commercial Court'); ?></a></p>
                                        <p><a href="#"><?= Yii::t('app', 'Land Court'); ?></a></p>
                                        <p><a href="#"><?= Yii::t('app', 'Labour Court'); ?></a></p>
                                        <p><a href="#"><?= Yii::t('app', 'High court division of corruption and economic crimes'); ?></a></p>
                                    </div>
                                </div>
                            </div>
                             <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse21">
                                       <?= Yii::t('app', 'RESIDENT MAGISTRATES COURTS'); ?>
                                    </a>
                                </div>
                                <div id="collapse21" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <div class="answer"><?= Yii::t('app', 'RMs Courts'); ?>:</div>
                                        <p><a href="#">Kisutu</a></p>
                                        <p><a href="#">Kivukoni</a></p>
                                        <p><a href="#">Arusha</a></p>
                                        <p><a href="#">Moshi</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</div>
