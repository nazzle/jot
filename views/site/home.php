<?php

use yii\grid\GridView;
use yii\helpers\Html;
use app\models\Posts;
use yii\helpers\Url;
use app\models\UserResponses;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;

/* @var $this yii\web\View */

$this->title = 'Judiciary of Tanzania | Home';
?>
<div class="site-index">

 <!-- Homepage Slider -->
        <div class="homepage-slider">
            <div id="sequence">
                <ul class="sequence-canvas">
                    <!-- Slide 1 -->
                    <li class="bg4">
                        <!-- Slide Title -->
                        <h5 class="title">MAKAMU WA RAIS AHUDHURIA SHEREHE YA KUAPISHWA MAJAJI WATEULE WA MAHAKAMA YA AFRIKA:</h5>
                        <!-- Slide Text -->
                        <h3 class="subtitle">Makamu wa Rais wa Jamhuri ya Muungano wa Tanzania, Mhe. Samia Suluhu Hassan akizungumza katika hafla hiyo ya Uapisho ilifanyika Agosti, 27,2018 katika Ofisi za Mahakama ya Afrika na Haki za Binadamu na Watu zilizopo mkoani Arusha.</h3>
                        <!-- Slide Image -->
                        <img class="slide-img" src="img/homepage-slider/makamu.jpg" alt="Slide 1" />
                    </li>
                    <!-- End Slide 1 -->
                    <!-- Slide 2 -->
                    <li class="bg3">
                        <!-- Slide Title -->
                        <h5 class="title">JAJI MKUU WA TANZANIA ATEMBELEWA NA WAKILI MKUU WA SERIKALI AGOSTI, 23, 2018:</h5>
                        <!-- Slide Text -->
                        <h3 class="subtitle">Pichani ni Jaji Mkuu wa Tanzania, Mhe. Prof. Ibrahim Hamis Juma (kulia) akizungumza jambo na Wakili Mkuu wa Serikali, Dkt. Julius Mashamba (katikati), kushoto ni Naibu Wakili Mkuu wa Serikali, Dkt. Ally Possi, katika mazungumzo hayo Mhe. Jaji Mkuu ameahidi kuwapa ushirikiano katika utendaji kazi.!</h3>
                        <!-- Slide Image -->
                        <img class="slide-img" src="img/homepage-slider/Jaji.jpg" alt="Slide 2" />
                    </li>
                    <!-- End Slide 2 -->
                    <!-- Slide 3 -->
                    <li class="bg1">
                        <!-- Slide Title -->
                        <h2 class="title">JAJI Mhe. ILVIN MUGETA AKIZUNGUMZA NA WANANCHI</h2>
                        <!-- Slide Text -->
                        <h3 class="subtitle">Jaji wa Mahakama Kuu ya Tanzania, Kanda ya Dar es Salaam, Mhe. Ilvin Mugeta akizungumza na wananchi (hawapo pichani) Agosti 29, wakati wa uzinduzi rasmi wa programu maalum ya Kanda hiyo ya kuzungumza na wateja wake.</h3>
                        <!-- Slide Image -->
                        <img class="slide-img" src="img/homepage-slider/mugeta.jpg" alt="Slide 3" />
                    </li>
                    <!-- End Slide 3 -->
                </ul>
                <div class="sequence-pagination-wrapper">
                    <ul class="sequence-pagination">
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Homepage Slider -->

        <!-- Dashboard section -->
        <div class="section">
            <div class="container">
                <h2>Dashboard section (News and Hints)</h2>
                    <div class="row">
                          <?php
                          $posts = new Posts;                          
                          $rows = Posts::find()->all();
                            if(!empty($rows))
                                {
                                    foreach($rows as $row)
                                    {
                                        $link = Url::to(['posts/webview','id'=>$row['id']]);
                                        echo 
                                        '<div class="row service-wrapper-row">
                                        <div class="col-sm-4">
                                            <div class="service-image">
                                                <img src="img/services1.jpg" alt="Service Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <h3>'.$row['title'].'</h3>
                                            <p>'
                                               .$row['descriptions']. 
                                            '</p>
                                        </div>
                                    </div>
                                    <div class="comment-actions">
                                                <span class="comment-date">'.$row['time'].'</span>
                                                <a href="#" data-toggle="tooltip" data-original-title="Like" class="show-tooltip"><i class="glyphicon glyphicon-thumbs-up"></i></a>
                                                <a href="#" data-toggle="tooltip" data-original-title="Dislike" class="show-tooltip"><i class="glyphicon glyphicon-thumbs-down"></i></a>
                                                <span class="label label-success">+'.$row['id'].'</span>
                                                <a href=" '.$link.' " class="btn btn-micro btn-grey comment-reply-btn"><i class="glyphicon glyphicon-share-alt"></i> See More & Comment</a>
                                    </div>'
                                        ;
                                    }
                                }
                          ?>              
                    </div>
                    <div class="col-md-12">
                        <div class="calltoaction-wrapper">
                            <h3><?= Yii::t('db','Click here to view all') ?></h3> <a href="http://www.dragdropsite.com" class="btn btn-orange">Read More!</a>
                        </div>
                    </div>
            </div>
        </div>
        <!-- Dashboard end -->            

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
                            <span class="counter">2345</span>
                            <h4>total case</h4>
                        </div>
                        <div class="single-counter">
                            <a href="#" class="smile"><i class="fa fa-smile-o"></i></a>
                            <span class="counter">3478</span>
                            <h4>satisfied case</h4>
                        </div>
                        <div class="single-counter">
                            <a href="#" class="magic"><i class="fa fa-magic"></i></a>
                            <span class="counter">1589</span>
                            <h4>solved case</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
                </div>
            </div>
        </div>

        <!-- End Dashboard section -->

        <!-- Press Coverage -->
        <div class="section">
            <div class="container">
                <h2>Current Vision, Mission and Major Function</h2>
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

        <!-- Services -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="service-wrapper">
                            <img src="img/service-icon/list.png" alt="Service 1">
                            <h3><?= Yii::t('app','Cause Lists'); ?></h3>
                            <p>
                                <?= Yii::t('app', 'Schedule of cases to be heard by the courts on the following days.The Causelists give details such as Judges.'); ?>
                            </p>
                            <a href="<?= Url::to(['cause-list/weblist'])?>" class="btn"> <?= Yii::t('app','View Cause Lists'); ?> </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="service-wrapper">
                            <img src="img/service-icon/statis.png" alt="Service 2">
                            <h3><?= Yii::t('app','Cases Statistics'); ?></h3>
                            <p>Suspendisse eget libero mi. Fusce ligula orci, vulputate nec elit ultrices, ornare faucibus orci. Aenean lectus sapien, vehicula</p>
                            <a href="<?= Url::to(['site/statistics'])?>" class="btn"><?= Yii::t('app','View Statistics'); ?></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="service-wrapper">
                            <img src="img/service-icon/db.png" alt="Service 3">
                            <h3><?= Yii::t('app','Judgments and Decisions'); ?></h3>
                            <p>Phasellus posuere et nisl ac commodo. Nulla facilisi. Sed tincidunt bibendum cursus. Aenean vulputate aliquam risus rutrum scelerisque</p>
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
                    <div class="col-md-12">
                        <div class="calltoaction-wrapper">
                            <h3>New uploaded cause lists for all courts</h3> <a href="http://www.dragdropsite.com" class="btn btn-orange">Download here!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Call to Action Bar -->

        <!-- Testimonials -->
        <div class="section">
            <div class="container">
                <h2>Who is who in Judiciary</h2>
                <div class="row">
                    <!-- Testimonial -->
                    <div class="testimonial col-md-4 col-sm-6">
                        <!-- Author Photo -->
                        <div class="author-photo">
                            <img src="img/jaji-mkuu.jpg" alt="Author 1">
                        </div>
                        <div class="testimonial-bubble">
                            <blockquote>
                                <!-- Quote -->
                                <p class="quote">
                                    "The top most position of the Judiciary held by the Chief Justice (CJ)."
                                </p>
                                <!-- Author Info -->
                                <cite class="author-info">
                                    - Hon. IBRAHIM HAMIS JUMA,<br>Chief Justice at <a href="#">Judiciary Of Tanzania</a>
                                </cite>
                            </blockquote>
                            <div class="sprite arrow-speech-bubble"></div>
                        </div>
                    </div>
                    <!-- End Testimonial -->
                    <div class="testimonial col-md-4 col-sm-6">
                        <div class="author-photo">
                            <img src="img/jaji-kiongozi.jpg" alt="Author 2">
                        </div>
                        <div class="testimonial-bubble">
                            <blockquote>
                                <p class="quote">
                                    "This position is held by someone responsible on managing all judges."
                                </p>
                                <cite class="author-info">
                                    - Hon. Ferdinand Wambali,<br>Chief Judge at <a href="#">Judiciary Of Tanzania</a>
                                </cite>
                            </blockquote>
                            <div class="sprite arrow-speech-bubble"></div>
                        </div>
                    </div>
                    <div class="testimonial col-md-4 col-sm-6">
                        <div class="author-photo">
                            <img src="img/mtendaji-mkuu.jpg" alt="Author 3">
                        </div>
                        <div class="testimonial-bubble">
                            <blockquote>
                                <p class="quote">
                                    "Responsible in all Judiciary duties and management."
                                </p>
                                <cite class="author-info">
                                    - Hon. HUSSEIN KATANGA,<br>Chief Court Administrator at <a href="#">Judiciary Of Tanzania</a>
                                </cite>
                            </blockquote>
                            <div class="sprite arrow-speech-bubble"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Testimonials -->


        <!-- News and Updates -->
        <div class="section">
            <div class="container">
                <h2>News and Updates</h2>
                <div class="row">
                    <!-- Pricing Plans Wrapper -->
                    <div class="pricing-wrapper col-md-12">
                        <!-- Pricing Plan -->
                        <div class="pricing-plan">
                            <!-- Pricing Plan Ribbon -->
                            <div class="ribbon-wrapper">
                                <div class="price-ribbon ribbon-red">Popular</div>
                            </div>
                            <h2 class="pricing-plan-title">Decisions</h2>
                            <p class="pricing-plan-price">Uploads</p>
                            <!-- Pricing Plan Features -->
                            <ul class="pricing-plan-features">
                                <li><strong>54</strong> High Court</li>
                                <li><strong>21</strong> Land Division</li>
                                <li><strong>12</strong> Court of Appeal</li>
                            </ul>
                            <a href="index.html" class="btn">Preview</a>
                        </div>
                        <!-- End Pricing Plan -->
                        <div class="pricing-plan">
                            <h2 class="pricing-plan-title">Judiciary Blog</h2>
                            <p class="pricing-plan-price">Updates<span></span></p>
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
                <h2>Complaints and Suggestions</h2>
                <div class="row">
                    <div class="col-sm-7 social-login">
                        <p>Or you can also see us on Facebook or Twitter</p>
                        <div class="social-login-buttons">
                            <a href="#" class="btn-facebook-login">Login with Facebook</a>
                            <a href="#" class="btn-twitter-login">Login with Twitter</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="not-member">
                            <p>Want updates and newsletters? <a href="page-register.html">Register here</a></p>
                    </div>
                    </div>
                    <div class="col-sm-5">
                        <!-- Contact Form -->
                        <h3>Send Us a Message</h3>
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
                                        'message_type'=>['type'=>Form::INPUT_DROPDOWN_LIST,'options'=>['placeholder'=>'Enter message type...'],'items'=>[ 'Complaints' => 'Complaints', 'Suggestions' => 'Suggestions', ]],
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

        <!-- Useful Links -->
        <div class="section">
            <div class="container">
                <h2>Useful Links</h2>
                <div class="clients-logo-wrapper text-center row">
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/canon.png" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/cisco.png" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/dell.png" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/ea.png" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/ebay.png" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/facebook.png" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/google.png" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/hp.png" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/microsoft.png" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/mysql.png" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/sony.png" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="img/logos/yahoo.png" alt="Client Name"></a></div>
                </div>
            </div>
        </div>
        <!-- End Useful Links -->


</div>
