<?php
use yii\grid\GridView;
use yii\helpers\Html;
use app\modules\land\models\LandPosts;
use app\models\UsefulAttachments;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\models\UserResponses;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use app\models\WhoIsWho;

?>
<div class="land-default-index">

    <div class="section">
            <div class="container">
                <div class="row">
                    <!-- Sidebar -->
                    <div class="col-sm-4 blog-sidebar">
                        <h4><?=Yii::t('app', 'Search Posts') ?></h4>
                        <form>
                            <div class="input-group">
                                <input class="form-control input-md" id="appendedInputButtons" type="text">
                                <span class="input-group-btn">
                                    <button class="btn btn-md" type="button"><?=Yii::t('app', 'Search')?></button>
                                </span>
                            </div>
                        </form>
                        <h4><?=Yii::t('app', 'Recent Posts') ?></h4>
                        <ul class="recent-posts">
                            <?php    
                            $posts = LandPosts::find()->limit('4')->orderBy(['id' => SORT_DESC])->all();                                                           
                             if(!empty($posts))
                             {
                                 foreach($posts as $post)
                                    {
                                        echo 
                                        '<li><a href=" '.Url::to(['land-posts/webview','id'=>$post['id']]).' ">'.$post['title'].'</li>';
                                    }
                                } ?>
                        </ul>
                         <h4><?= Yii::t('app', 'Categories'); ?></h4>
                        <ul class="blog-categories">
                            <li><a href="<?=Url::to(['land-posts/photogallery']) ?>"><?= Yii::t('app', 'Photo Gallery'); ?></a></li>
                            <li><a href="#"><?= Yii::t('app', 'Video Gallery'); ?></a></li>
                            <li><a href="#"><?= Yii::t('app', 'Frequently Asked Questions-FAQ'); ?></a></li>
                        </ul>
                        <h4><?= Yii::t('app', 'Major Links'); ?></h4>
                        <ul class="blog-categories">
                            <li><a href="https://jsds.judiciary.go.tz"><?= Yii::t('app', 'JSDS 2'); ?></a></li>
                            <li><a href="#"><?= Yii::t('app', 'Court Fees'); ?></a></li>
                            <li><a href="#"><?= Yii::t('app', 'Tanzania Law Reports and Digest'); ?></a></li>
                            <li><a href="#"><?= Yii::t('app', 'Judgement Database'); ?></a></li>
                            <li><a href="#"><?= Yii::t('app', 'Judiciary TV'); ?></a></li>
                        </ul>
                    </div>
                    <!-- End Sidebar -->
                    <div class="col-sm-8">

                        <!-- Homepage Slider -->
                        <div class="homepage-slider">
                            <div class="row" style="background-image: url('img/homepage-slider/slider-bg3.jpg');">
                                 <div class="container" align="left">
                                    <?php                         
                                        $slides = LandPosts::find()->limit('5')->orderBy(['id' => SORT_DESC])->all();
                                        if(!empty($slides))
                                        {
                                            foreach($slides as $slide)
                                            {
                                        echo \melledijkstra\slideshow\Slideshow::widget([
                                        'items' => [
                                            [
                                                'content' =>  '<img src=" '.$slide['attachment'].' " alt="Pictures To Display" height="480" width="900">',
                                                //'active' => true,
                                            ],
                                        ],
                                        // The client options will be passed to the Javascript swiper library
                                        // @see http://idangero.us/swiper/api/#parameters
                                        'clientOptions' => [
                                            'direction' => 'horizontal',
                                            'speed' => 700,    
                                            'autoplay' => true,
                                        ]
                                     ]); 

                                     }}?>
                                 </div>
                            </div>
                        </div>
                        <!-- End Homepage Slider -->

                        <!-- Services -->
                        <div class="section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-2 col-sm-6">
                                        <div class="service-wrapper">
                                            <img src="img/service-icon/list.png" alt="Service 1">
                                            <h3><?= Yii::t('app','Cause Lists'); ?></h3>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <div class="service-wrapper">
                                            <img src="img/service-icon/statis.png" alt="Service 2">
                                            <h3><?= Yii::t('app','Statistics'); ?></h3>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <div class="service-wrapper">
                                            <img src="img/service-icon/db.png" alt="Service 3">
                                            <h3><?= Yii::t('app','Judgments'); ?></h3>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <div class="service-wrapper">
                                            <img src="img/service-icon/db.png" alt="Service 3">
                                            <h3><?= Yii::t('app','Judgments'); ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Services -->
                    </div>
                    <!-- End Blog Post -->
                </div>
            </div>
        </div>

</div>
