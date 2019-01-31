<?php

use yii\grid\GridView;
use yii\helpers\Html;
use app\models\Posts;
use app\models\UsefulAttachments;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\models\UserResponses;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use app\models\WhoIsWho;
use kartik\social\GoogleAnalytics;
use app\models\Announcements;
use app\models\Tenders;
use app\models\HakiBulletin;

/* @var $this yii\web\View */

$this->title = 'Judiciary of Tanzania | Home';
?>
<div class="site-index">

   <!-- Homepage Slider -->
   <div class="homepage-slider">
        <div id="sequence">
            <ul class="sequence-canvas">
                <!-- Slide 3 --> 
                <?php                         
                $slides = Posts::find()->limit('5')->orderBy(['id' => SORT_DESC])->all();
                if(!empty($slides))
                {
                    foreach($slides as $slide)
                    {
                        echo 
                        '<li class="bg1">
                        <!-- Slide Title -->
                        <h2 class="title">'.$slide['title'].'</h2>
                        <!-- Slide Text -->
                        <h3 class="subtitle">'.substr($slide['descriptions'], 0,90)."...".'</h3>
                        <!-- Slide Image -->
                        <img class="slide-img" draggable="false" src="'.$slide['attachment'].'" alt="Slide 3" />
                        </li>'; }} ?>

                        <!-- End Slide 3 -->
            </ul>
                    <div class="sequence-pagination-wrapper">
                        <ul class="sequence-pagination">
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>
                            <li>5</li>
                        </ul>
                    </div>
        </div>
    </div>
        <!-- End Homepage Slider -->

        <!-- Dashboard section -->
    <div class="section">
        <div class="container">
            <h2><?=Yii::t('app', 'News and Events')?></h2>
            <div class="row">
                <div class="col-sm-8">
                      <?php
                      $posts = new Posts;                          
                      $rows = Posts::find()->limit('4')->orderBy(['id' => SORT_DESC])->all();
                      if(!empty($rows))
                      {
                        foreach($rows as $row)
                        {
                            if($row['time']==date('Y-m-d'))
                                {
                                   $blink = '<span class="blink_text"><img draggable="false" src="img/new.gif"></span>';
                                }else {
                                    $blink = '';
                                }
                            echo 
                            '<div class="row service-wrapper-row">
                            <div class="col-sm-4">
                            <div class="service-image">
                            <img draggable="false" src="'.$row['attachment'].'" alt="News Photo">
                            </div>
                            </div>
                            <div class="col-sm-8">
                            <h3>'.$row['title'].$blink.'</h3>
                            <p>'
                            .substr($row['descriptions'], 0,150)."...". 
                            '</p>
                            </div>
                            </div>
                            <div class="comment-actions">
                            <span class="comment-date">'.$row['time'].'</span>
                            <a href=" '.Url::to(['site/likes', 'id'=>$row['id']]).'
                            " data-toggle="tooltip" data-original-title="Like" class="show-tooltip"><i class="glyphicon glyphicon-thumbs-up"></i></a>
                            <a href="'.Url::to(['site/dislikes', 'id'=>$row['id']]).'" data-toggle="tooltip" data-original-title="Dislike" class="show-tooltip"><i class="glyphicon glyphicon-thumbs-down"></i></a>
                            <span class="label label-success">+'.$row['likes'].'</span>
                            <span class="label label-danger">-'.$row['dislikes'].'</span>
                            <a href=" '.Url::to(['posts/webview','id'=>$row['id']]).' " class="btn btn-micro btn-grey comment-reply-btn"><i class="glyphicon glyphicon-share-alt"></i> See More & Comment</a>
                            </div>'
                            ;
                        }
                    }
                    ?>
                    <!-- Judiciary TV Section -->
                    <div class="col-sm-12">
                        <h4><?=Yii::t('app', 'Judiciary TV') ?> <i class="fa fa-youtube"></i></h4>
                        <h5 style="color: red;"><?=Yii::t('app', "What's New") ?></h5>
                        <p>
                            <?=Yii::t('app', 'Follow and subscribe to our YouTube channel for updates on daily basis. Do not forget to turn on notification so you are always up to date') ?>.
                        </p>
                        <div class="product-image-large">
                            <iframe src="http://www.youtube.com/embed/?listType=user_uploads&list=mahakama-ya-tanzania" width="700" height="400"></iframe>
                        </div>
                    </div>
                    <!-- End Judiciary TV Section -->    
                </div>

                <!-- Sidebar -->
                <div class="col-sm-4 blog-sidebar">
                        <h4><?= Yii::t('app', 'Search Posts'); ?></h4>
                        <form>
                            <div class="input-group">
                                <input class="form-control input-md" id="appendedInputButtons" type="text">
                                <span class="input-group-btn">
                                    <button class="btn btn-md" type="button"><?= Yii::t('app', 'Search'); ?></button>
                                </span>
                            </div>
                        </form>
                        <?php    
                            $HakiBulletins = HakiBulletin::find()->where(['time'=>date('Y-m-d')])->all();                                                            
                             if(!empty($HakiBulletins))
                                 {
                                    echo '<h4 style="color: red;">'.Yii::t('app', 'HAKI BULLETIN').'<span class="blink_text"><img src="img/new.gif"></span></h4>';
                                }else {
                                    echo '<h4 style="color: red;">'.Yii::t('app', 'HAKI BULLETIN').'</h4>';
                                } 
                        ?>     
                        <ul class="recent-posts">
                            <?php    
                            $HakiBulletins = HakiBulletin::find()->limit('1')->orderBy(['id' => SORT_DESC])->all();                                                            
                             if(!empty($HakiBulletins))
                                 {
                                 foreach($HakiBulletins as $HakiBulletin)
                                    {
                                       /* if(substr($announcement['attachment'],-4) == '.pdf')*/                                        
                                             echo          
                                            '<div class="col-md-12">
                                                    <!-- Products Slider Item -->
                                                    <a href="'.Url::to(['haki-bulletin/pdf', 'id' => $HakiBulletin['id']]).'">
                                                    <div class="shop-item">
                                                        <!-- Product Image -->
                                                        <div class="image">
                                                            <img draggable="false" src="'.$HakiBulletin['poster'].'" alt="Poster">
                                                        </div>
                                                        <!-- Product Title -->
                                                        <div class="title">
                                                            <h3>'.$HakiBulletin['caption'].'</h3>
                                                        </div>
                                                    </div>
                                                    </a>
                                            </div>';     
                                    }
                             }
                            ?>
                        </ul>
                        <h4 style="color: red;"><?= Yii::t('app', 'Categories'); ?></h4>
                        <ul class="blog-categories">
                            <li><a href="<?=Url::to(['posts/photogallery']) ?>"><?= Yii::t('app', 'Photo Gallery'); ?></a></li>
                            <li><a href="<?=Url::to(['user-responses/faqs']) ?>"><?= Yii::t('app', 'Frequently Asked Questions-FAQ'); ?></a></li>
                        </ul>
                        <h4 style="color: red;"><?= Yii::t('app', 'Major Links'); ?></h4>
                        <ul class="blog-categories">
                            <?php    
                            $tenders = Tenders::find()->where(['time'=>date('Y-m-d')])->all();                                                            
                             if(!empty($tenders))
                                 {
                                    echo '<li><a href=" '.Url::to(['tenders/webview']).' ">'.Yii::t('app', 'Tenders').' <span class="blink_text"><img draggable="false" src="img/new.gif"></span> </a></li>';
                                }else {
                                    echo '<li><a href=" '.Url::to(['tenders/webview']).' ">'.Yii::t('app', 'Tenders').'</a></li>';
                                } 
                                ?>                               
                            <li><a href="#"><?= Yii::t('app', 'Court Fees'); ?></a></li>
                            <li><a href="<?=Url::to(['vacancies/webview'])?>"><?= Yii::t('app', 'Vacancies'); ?></a></li>
                        </ul>
                        <h4 style="color: red;"><?= Yii::t('app', 'Announcements'); ?> <a href="#" class="btn btn-blue"><?= Yii::t('app','See All'); ?></a></h4>
                        <ul class="blog-categories">
                            <?php    
                            $announcements = Announcements::find()->where(['type'=>'With Attachment'])->limit('2')->orderBy(['id' => SORT_DESC])->all();                                                            
                             if(!empty($announcements))
                                 {
                                 foreach($announcements as $announcement)
                                    {
                                        if($announcement['time']==date('Y-m-d'))
                                        {
                                           $blink = '<span class="blink_text"><img draggable="false" src="img/new.gif"></span>';
                                        }else {
                                            $blink = '';
                                        }
                                        echo 
                                        '<li><a href=" '.Url::to(['announcements/pdf','id'=>$announcement['id']]).' ">'.$announcement['title']. $blink.'</a></li>';
                                    }
                                } ?>
                            <?php    
                            $announcements = Announcements::find()->where(['type'=>'With Poster'])->limit('1')->orderBy(['id' => SORT_DESC])->all();                                                            
                             if(!empty($announcements))
                                 {
                                 foreach($announcements as $announcement)
                                    {
                                       /* if(substr($announcement['attachment'],-4) == '.pdf')*/                                        
                                             echo          
                                            '<div class="col-md-12">
                                                    <!-- Products Slider Item -->
                                                    <div class="shop-item">
                                                        <!-- Product Image -->
                                                        <div class="image">
                                                            <img draggable="false" src="'.$announcement['attachment'].'" alt="Poster">
                                                        </div>
                                                        <!-- Product Title -->
                                                        <div class="title">
                                                            <h3>'.$announcement['title'].'</h3>
                                                        </div>
                                                    </div>
                                            </div>';     
                                    }
                                }
                                ?>
                        </ul>
                </div>
                    <!-- End Sidebar -->
            </div>                                               
        </div>
    </div>
    <!-- Call to Action Bar -->
        <div class="section section-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="calltoaction-wrapper">
                            <h3><?= Yii::t('app','To view all news and events'); ?></h3> <a href="<?=Url::to(['posts/allwebposts']) ?>" class="btn btn-orange"><?= Yii::t('app','Click Here'); ?>!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Call to Action Bar -->        
    <!-- Dashboard end -->   
        <!-- Services -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="service-wrapper">
                        <img src="img/service-icon/list.png" alt="Service 1">
                        <h3><?= Yii::t('app','Cause Lists'); ?></h3>
                        <p>
                            <?= Yii::t('app', 'Schedule of cases to be heard by the courts on the following days.The Causelists give details such as Judges'); ?>.
                        </p>
                        <a href="<?= Url::to(['cause-list/weblist'])?>" class="btn"> <?= Yii::t('app','View Cause Lists'); ?> </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service-wrapper">
                        <img src="img/service-icon/statis.png" alt="Service 2">
                        <h3><?= Yii::t('app','Cases Statistics'); ?></h3>
                        <p><?= Yii::t('app', 'This module underline the cases roadmaps from the moment of their filing to the decision period'); ?>.</p>
                        <a href="<?= Url::to(['site/statistics'])?>" class="btn"><?= Yii::t('app','View Statistics'); ?></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service-wrapper">
                        <img src="img/service-icon/db.png" alt="Service 3">
                        <h3><?= Yii::t('app','Judgments and Decisions'); ?></h3>
                        <p><?= Yii::t('app', 'Get to view popular Judgments that have caught puplic attention and interest'); ?>.</p>
                        <a href="<?= Url::to(['judgments/weblist'])?>"" class="btn"><?= Yii::t('app','View Judgments'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services -->
     <!-- Call to Action Bar -->
    <div class="section section-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="calltoaction-wrapper">
                        <h2><?=Yii::t('app', 'Attachments'); ?> <a href="#" class="btn btn-orange"><?=Yii::t('app', 'View All'); ?></a></h2> 

                        <table class="events-list">
                            <?php                         
                            $attachments = UsefulAttachments::find()->where(['category'=>'Attachment'])->limit('5')->orderBy(['id' => SORT_DESC])->all();
                            if(!empty($attachments))
                            {
                                foreach($attachments as $attachment)
                                {
                                    echo 
                                    '<tr>
                                    <td>
                                    <div class="event-date">
                                    <div class="event-month">'.$attachment['category'].'</div>
                                    <div class="event-month">'.$attachment['upload_time'].'</div>
                                    </div>
                                    </td>
                                    <td>
                                    '.$attachment['descriptions'].'
                                    </td>
                                    <td><a href="'.Url::to(['site/pdf', 'id' => $attachment['id']]).'" class="btn btn-green btn-sm event-more">'.Yii::t('app', 'View Attachment').'</a></td>
                                    </tr>'; }} ?>

                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                    <div class="calltoaction-wrapper">
                        <h2><?=Yii::t('app', 'Courts Fees'); ?> <a href="#" class="btn btn-orange"><?=Yii::t('app', 'View All'); ?></a></h2> 

                        <table class="events-list">
                            <?php                         
                            $attachments = UsefulAttachments::find()->where(['category'=>'Fees'])->limit('5')->orderBy(['id' => SORT_DESC])->all();
                            if(!empty($attachments))
                            {
                                foreach($attachments as $attachment)
                                {
                                    echo 
                                    '<tr>
                                    <td>
                                    <div class="event-date">
                                    <div class="event-month">'.$attachment['category'].'</div>
                                    <div class="event-month">'.$attachment['upload_time'].'</div>
                                    </div>
                                    </td>
                                    <td>
                                    '.$attachment['descriptions'].'
                                    </td>
                                    <td><a href=" '.Url::to(['site/pdf', 'id' => $attachment['id']]).' " class="btn btn-green btn-sm event-more">'.Yii::t('app', 'View Fees').'</a></td>
                                    </tr>'; 
                                }} ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Call to Action Bar -->         

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="lawyer-bg">
                    <div class="laywer-title">
                        <div class="lawyer-title-table-cell">
                            <div class="lawyer-wrapper-1">
                                <div class="lawyer-wrapper-2">
                                    <div class="lawyer-wrapper-3">
                                        <img src="img/lawery-icon.png" alt="lawyer-icon">
                                        <h3>Cases Statistics</h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-8">
                            <div class="counter-area">
                                <div class="single-counter">
                                    <a href="#" class="telegram"><i class="fa fa-send"></i></a>
                                    <span class="counter">-</span>
                                    <h4>Monthly Registered Cases</h4>
                                </div>
                                <div class="single-counter">
                                    <a href="#" class="smile"><i class="fa fa-smile-o"></i></a>
                                    <span class="counter">-</span>
                                    <h4>Monthly Assigned Cases</h4>
                                </div>
                                <div class="single-counter">
                                    <a href="#" class="magic"><i class="fa fa-magic"></i></a>
                                    <span class="counter">-</span>
                                    <h4>Monthly Decided Cases</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- End Dashboard section -->

            <!-- Testimonials -->
            <div class="section">
                <div class="container">
                    <h2><?=Yii::t('app', 'Who is who in Judiciary') ?></h2>
                    <div class="row">

                        <div class="col-md-12">
                        <div class="products-slider">
                            <!-- Products Slider Item -->
                            <?php                         
                            $staffs = WhoIsWho::find()->all();
                            if(!empty($staffs))
                            {
                                foreach($staffs as $staff)
                                { echo '
                            <div class="shop-item">
                                <!-- Product Image -->
                                <div class="image">
                                    <img draggable="false" src=" '.$staff['photo'].' " alt="Staff Name">
                                </div>
                                <!-- Product Title -->
                                <div class="title">
                                    <h3>'.$staff['name'].'</h3>
                                </div>
                                <!-- Product Price -->
                                <div class="price">
                                    '.$staff['position'].'
                                </div>
                            </div>'; }} ?>

                            <!-- End Products Slider Item -->
                        </div>
                    </div>

                    </div>
                </div>
            </div>
            <!-- End Testimonials -->
                        <!-- Press Coverage -->
            <div class="section">
                <div class="container">
                    <h2><?=Yii::t('app', 'Current Vision, Mission and Major Function'); ?></h2>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="in-press press-wired">
                                <a href="#"> Timely and Accessible Justice for All.</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="in-press press-mashable">
                                <a href="#">To carry out the administration of Justice to the general public in dealing with disposal of cases effectively and efficiently.</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="in-press press-techcrunch">
                                <a href="#">
                                    Interpreting diverse Laws and execution administrative decisions.
                                    Hearing and deciding cases filed before the courts of law.
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Press Coverage -->

            <!-- News and Updates -->
            <div class="section">
                <div class="container">
                    <h2><?= Yii::t('app', 'Projects and Updates'); ?></h2>
                    <div class="row">
                        <!-- Pricing Plans Wrapper -->
                        <div class="pricing-wrapper col-md-12">
                            <!-- Pricing Plan -->
                            <div class="pricing-plan"><a href="<?=Url::to(['site/folders']) ?>">
                                <!-- Pricing Plan Ribbon -->
                                <div class="ribbon-wrapper">
                                    <span class="blink_text"><div class="price-ribbon ribbon-red"><?=Yii::t('app', 'New Upload') ?></div></span>
                                </div>
                                <h2 class="pricing-plan-title"><?=Yii::t('app', 'Court Documents') ?></h2>
                                <p class="pricing-plan-price"><?=Yii::t('app', 'Uploads') ?></p>
                                <!-- Pricing Plan Features -->
                                <ul class="pricing-plan-features">
                                    <li><strong>54</strong> Reports</li>
                                    <li><strong>21</strong> Court Forms</li>
                                    <li><strong>12</strong> Law Digests</li>
                                </ul>
                                <a href="index.html" class="btn">Preview</a>
                            </a></div>
                            <!-- End Pricing Plan -->
                            <div class="pricing-plan">
                                <!-- Pricing Plan Ribbon -->
                                <div class="ribbon-wrapper">
                                    <div class="price-ribbon ribbon-green">New</div>
                                </div>
                                <h2 class="pricing-plan-title">Tenders Updates</h2>
                                <p class="pricing-plan-price">Tenders<span></span></p>
                                <ul class="pricing-plan-features">
                                    <li><strong>Events</strong> and Occasions</li>
                                    <li><strong>Updates</strong> news</li>
                                    <li><strong>Galleris</strong> photos</li>
                                </ul>
                                <a href="index.html" class="btn">Visit Now</a>
                            </div>
                            <!-- Promoted Pricing Plan -->
                            <div class="pricing-plan pricing-plan-promote">
                                <h2 class="pricing-plan-title">Judiciary Projects</h2>
                                <p class="pricing-plan-price">Projects<span></span></p>
                                <ul class="pricing-plan-features">
                                    <li><strong>Ongoing</strong> projects</li>
                                    <li><strong>Completed</strong> projects</li>
                                    <li><strong>Proposed</strong> projects</li>
                                </ul>
                                <a href="index.html" class="btn">View Details</a>
                            </div>
                            <div class="pricing-plan">
                                <!-- Pricing Plan Ribbon -->
                                <div class="ribbon-wrapper">
                                    <div class="price-ribbon ribbon-green">New</div>
                                </div>
                                <h2 class="pricing-plan-title">Databases</h2>
                                <p class="pricing-plan-price">Systems<span></span></p>
                                <ul class="pricing-plan-features">
                                    <a><li><strong>Judgments</strong> Database</li></a>
                                    <li><strong>Advocates</strong> Database</li>
                                    <li><strong>JSDS II</strong> Version 2</li>
                                </ul>
                                <a href="index.html" class="btn">Visit Now</a>
                            </div>
                        </div>
                        <!-- End Pricing Plans Wrapper -->
                    </div>   
                </div>
            </div>
            <!-- End News and Updates -->

            <!-- Complaints and Suggestions -->
            <div class="section">
                <div class="container">
                    <h2><?=Yii::t('app', 'Complaints and Suggestions'); ?></h2>
                    <div class="row">
                        <div class="col-sm-7 social-login">
                            <p><?=Yii::t('app', 'Or you can also see us on Facebook or Twitter'); ?></p>
                            <div class="social-login-buttons">
                                <a href="#" class="btn-facebook-login"><?=Yii::t('app', 'Login with Facebook');?></a>
                                <a href="#" class="btn-twitter-login"><?=Yii::t('app','Login with Twitter');?></a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="not-member">
                                <p><?=Yii::t('app', 'Want updates and newsletters'); ?>? <a href="page-register.html"><?=Yii::t('app', 'Register here'); ?></a></p>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <!-- Contact Form -->
                            <h3><?=Yii::t('app', 'Send Us a Message'); ?></h3>
                            <div class="contact-form-wrapper">
                                <?php
                                $userResponses = new UserResponses();
                                $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL,'action'=>['user-responses/create']]);
                                echo Form::widget([       // 1 column layout
                                    'model'=>$userResponses,
                                    'form'=>$form,
                                    'columns'=>1,
                                    'attributes'=>[
                                        'username'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter your name...']],
                                    ]
                                ]);

                                echo Form::widget([       // 1 column layout
                                    'model'=>$userResponses,
                                    'form'=>$form,
                                    'columns'=>1,
                                    'attributes'=>[
                                        'contact'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Phone/Email...']],
                                    ]
                                ]);  
                                echo Form::widget([
                                    'model'=>$userResponses,
                                    'form'=>$form,
                                    'columns'=>1,
                                    'attributes'=>[       // 2 column layout
                                    'message_type'=>['type'=>Form::INPUT_DROPDOWN_LIST,'options'=>['prompt'=>'Enter message type...'],'items'=>[ 'Complaints' => 'Complaints', 'Suggestions' => 'Suggestions', ]],
                                ]
                            ]); 
                                echo Form::widget([       // 1 column layout
                                    'model'=>$userResponses,
                                    'form'=>$form,
                                    'columns'=>1,
                                    'attributes'=>[
                                        'message'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Type complaints/Suggestions...']],
                                    ]
                                ]);  

                                 echo Form::widget([       // 2 column layout
                                    'model'=>$userResponses,
                                    'form'=>$form,
                                    'columns'=>2,
                                    'attributes'=>[
                                        'actions'=>[
                                            'type'=>Form::INPUT_RAW, 
                                            'value'=>'<div style="text-align: right; margin-top: 20px">' . 
                                            Html::resetButton('Reset', ['class'=>'btn btn-default']) . ' ' .
                                            Html::submitButton('Submit', ['type'=>'button', 'class'=>'btn btn-primary']) . 
                                            '</div>'
                                        ],
                                    ]
                                ]);
                                 ActiveForm::end();

                                 ?>
                             </div>
                             <!-- End Contact Info -->
                         </div>
                     </div>
                 </div>
             </div>
             <!-- End Complaints and Suggestions -->

              <!-- News and Updates -->
            <div class="section">
                <div class="container">
                    <h2><?= Yii::t('app', 'Banner Info'); ?></h2>
                    <div class="row">
                        <!-- Pricing Plans Wrapper -->
                        <div class="pricing-wrapper col-md-12">
                            <!-- Pricing Plan -->
                            <div class="pricing-plan">
                                <a href="#">
                                    <img draggable="false" src="img/haki-yako.jpg" alt="barnner">
                                </a>
                            </div>
                            <!-- End Pricing Plan -->
                            <div class="pricing-plan">
                                    <img draggable="false" src="img/rushwa.jpg" alt="barnner">
                            </div>
                            <!-- Promoted Pricing Plan -->
                            <div class="pricing-plan">
                                    <img draggable="false" src="img/haki-yako.jpg" alt="barnner">
                            </div>
                            <div class="pricing-plan">
                                    <img draggable="false" src="img/rushwa.jpg" alt="barnner">
                            </div>
                        </div>
                        <!-- End Pricing Plans Wrapper -->
                    </div>   
                </div>
            </div>
            <!-- End News and Updates -->

             <!-- Useful Links -->
             <div class="section">
                <div class="container">
                    <h2><?=Yii::t('app', 'Related Links'); ?></h2>
                    <div class="clients-logo-wrapper text-center row">
                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="http://www.ija.ac.tz/"><p><img draggable="false" src="img/logos/ija.png" alt="IJA"></p><p><strong>IJA</strong></p></a></div>

                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="http://tls.or.tz/"><p><img src="img/logos/tls.jpg" alt="TLS"></p><p><strong>TLS</strong></p></a></div>

                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="http://www.bunge.go.tz/"><p><img src="img/logos/bunge.jpg" alt="Bunge"></p><p><strong>Bunge La Tanzania</strong></p></a></div>

                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="http://www.bunge.go.tz/"><p><img src="img/logos/lst.png" alt="Law School"></p><p><strong>The Law School</strong></p></a></div>

                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><p><img src="img/logos/mlc.png" alt="MLC"></p><p><strong>Wizara ya katiba na sheria</strong></p></a></div>

                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><p><img src="img/logos/mlc.png" alt="TAWJA"></p><p><strong>Tanzania Women Judges Association</strong></p></a></div>

                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><p><img src="img/logos/mlc.png" alt="JMAT"></p><p><strong>Judges & Magistrate Association Of Tanzania</strong></p></a></div>

                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><p><img src="img/logos/wlac.jpg" alt="WLAC"></p><p><strong>WLAC</strong></p></a></div>

                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><p><img src="img/logos/mlc.png" alt="TAWJA"></p><p><strong>Tanzania Women Judges Association</strong></p></a></div>

                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><p><img src="img/logos/tlii.jpg" alt="TLII"></p><p><strong>Tanzania Legal Information Institute</strong></p></a></div>

                    </div>
                </div>
            </div>
            <!-- End Useful Links -->


</div>
