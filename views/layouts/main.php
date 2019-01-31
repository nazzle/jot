<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\widgets\Growl;
use kartik\social\GoogleAnalytics;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="<?= Yii::$app->params['rootPath']; ?>/nembo.png" type="image/x-icon" />
</head>
<body>
<?php $this->beginBody() ?>

<div class="mainmenu-wrapper">
    <!-- Preloader -->
    <!-- <div class="preloader_area">
        <div class="preloader loading">
            <span class="slice"></span>
            <span class="slice"></span>
            <span class="slice"></span>
            <span class="slice"></span>
            <span class="slice"></span>
            <span class="slice"></span>
        </div>
    </div> -->

    <!-- Header Top Area -->
    <header class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="email">
                        <a href="mailto:info@judiciary.go.tz"><i class="fa fa-envelope"></i>info@judiciary.go.tz</a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="phone">
                        <a href="tel:+255 22 2123897"><i class="fa fa-phone"></i>+255 22 2123897</a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="phone">
                        <a href="https://mail.judiciary.go.tz"><i class="fa fa-envelope-o"></i><?= Yii::t('app', 'Staff Emails'); ?></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <div class="social-icons">
                        <a href="https://www.facebook.com/The-Judiciary-of-Tanzania-654628221361656/"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.twitter.com/judiciarytz"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.youtube.com/channel/UCHNsfaFm_ERdRZxBAaARuqQ/featured"><i class="fa fa-youtube"></i></a>
                        <a href="http://tanzaniajudiciary.blogspot.com/"><i class="fa fa-bold"></i></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <div class="search-box">
                        <form action="index.html" class="search-area">
                            <input type="text" placeholder="Search">
                            <a href="#"><i class="fa fa-search"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
         <div class="menuextras">
                    <div class="extras">
                        <ul>
                             <?php
                                if (Yii::$app->user->isGuest) {
                                    echo '<li class="shopping-cart-items"><i class="fa fa-lock icon-white"></i> <a href="index.php?r=site/login"><b>  Login</b></a></li>';
                                } else {
                                    echo '<li class="shopping-cart-items"><i class="fa fa-unlock icon-white"></i><a data-method="post" href="index.php?r=site/logout"><b> Logout ('.Yii::$app->user->identity->username.') </b></a></li>';
                                }
                            ?>
                        </ul>
                        <ul>
                            <li class="shopping-cart-items"><i class="glyphicon glyphicon-cog icon-white"></i> <a href="#"><b><?= Yii::t('app', 'Change Language'); ?>:</b></a></li>
                            <li>
                                <div class="dropdown choose-country" style="color: #fff">
                                 <?php
                                    foreach(Yii::$app->params['languages'] as $key => $language){
                                        echo '<span class="language" id="'.$key.'">'.'<a>'.$language.'</a>'.' | </span>';
                                          }
                                   ?>
                                </div>
                            </li>
                        </ul>

                 </div>
             </div>
             <nav id="mainmenu" class="mainmenu">
                    <ul>
                        <li class="logo-wrapper"><a href="<?= Url::to(['site/index'])?>"><img draggable="false" src="img/jotlogo.jpg" alt="Judiciary Of Tanzania" height="50px" width="200px"></a></li>
                        <li class="active">
                            <a href="<?= Url::to(['site/index'])?>"><i class="fa fa-home"></i> <?= Yii::t('app', 'Home'); ?></a>
                        </li>
                        <li class="has-submenu">
                            <a href="#"><?= Yii::t('app', 'Zones And Divisions'); ?></a>
                            <div class="mainmenu-submenu">
                                <div class="mainmenu-submenu-inner"> 
                                    <div>
                                        <h4>JUDICIARY ZONES</h4>
                                        <ul>
                                            <li><a href="#">Arusha Zone</a></li>
                                            <li><a href="#">Mbeya Zone</a></li>
                                            <li><a href="#">Morogoro Zone</a></li>
                                            <li><a href="#">Mwanza Zone</a></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4><?=Yii::t('app', 'JUDICIARY DIVISIONS')?></h4>
                                        <ul>
                                            <li><a href="#"><?=Yii::t('app', 'Land Division')?></a></li>
                                            <li><a href="#">Commercial Division</a></li>
                                            <li><a href="#">Labour Court</a></li>
                                            <li><a href="#">Corruption Court</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="https://jsds.judiciary.go.tz"><?= Yii::t('app', 'JSDS 2'); ?></a>
                        </li>                        
                        <li>
                            <a href="https://tanzlii.org/"><?= Yii::t('app', 'Decisions'); ?></a>
                        </li>
                        <li class="has-submenu">
                            <a href="#"><?= Yii::t('app', 'More Pages'); ?> +</a>
                            <div class="mainmenu-submenu">
                                <div class="mainmenu-submenu-inner"> 
                                    <div>
                                        <h4>ABOUT JUDICIARY</h4>
                                        <ul>
                                            <li><a href="#">The Judiciary</a></li>
                                            <li><a href="#">Primary Functions and Values</a></li>
                                            <li><a href="#">Roles and Functions</a></li>
                                            <li><a href="#">Areas for Court Excellence</a></li>
                                            <li><a href="#">Organization Structure</a></li>
                                            <li><a href="#">News and Events</a></li>
                                            <li><a href="#">Judiciary Hierarchy</a></li>
                                            <li><a href="#">Judges</a></li>
                                            <li><a href="#">Database</a></li>
                                        </ul>
                                        <h4>PROJECTS</h4>
                                        <ul>
                                            <li><a href="#">Ongoing Projects</a></li>
                                            <li><a href="#">Completed Projects</a></li>
                                            <li><a href="#">Proposed Projects</a></li>
                                        </ul>
                                        <h4>REPORTS</h4>
                                        <ul>
                                            <li><a href="#">Statistics Reports</a></li>
                                            <li><a href="#">Annual Reports</a></li>
                                            <li><a href="#">Special Reports</a></li>
                                            <li><a href="#">Others</a></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4>LAW,RULES &ACTS</h4>
                                        <ul>
                                            <li><a href="#">Decisions</a></li>
                                            <li><a href="#">Rules & Procedures</a></li>
                                            <li><a href="#">Draft Rules</a></li>
                                            <li><a href="#">ACTS</a></li>
                                        </ul>
                                        <h4>COURT FORMS</h4>
                                        <ul>
                                            <li><a href="#">Civil Court Forms</a></li>
                                            <li><a href="#">Criminal Court Forms</a></li>
                                            <li><a href="#">PC-Probate & Administration</a></li>
                                            <li><a href="#">HC-Probate & Administration Forms</a></li>
                                        </ul>
                                        <h4>COURT BROKERS AND FEES</h4>
                                        <ul>
                                            <li><a href="#">Court Brokers, 2017</a></li>
                                            <li><a href="#">Court fees</a></li>
                                        </ul>
                                        <h4><?=Yii::t('app', 'VACANCIES') ?></h4>
                                        <ul>
                                            <li><a href="<?=Url::to(['vacancies/webview'])?>"><?=Yii::t('app', 'Job Opportunities') ?></a></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4>MULTIMEDIA</h4>
                                        <ul>
                                            <li><a href="#">Haki Bulletin Newsletter</a></li>
                                            <li><a href="#">Speech</a></li>
                                            <li><a href="#">Public Notice</a></li>
                                            <li><a href="#">Publications</a></li>
                                            <li><a href="#">Essential Reading</a></li>
                                            <li><a href="#">Audio</a></li>
                                            <li><a href="#">Video</a></li>
                                            <li><a href="#">Radio & TV Programs</a></li>
                                            <li><a href="#">Downloads</a></li>
                                            <li><a href="#">Photo gallery</a></li>
                                        </ul>
                                        <h4>CONTACT US</h4>
                                        <ul>
                                            <li><a href="#">Judiciary Contact Emails</a></li>
                                            <li><a href="#">Contact Address</a></li>
                                            <li><a href="#">Advocates</a></li>
                                            <li><a href="#">Feedback</a></li>
                                            <li><a href="#">Connect With Us</a></li>
                                            <li><a href="<?= Url::to(['site/management'])?>"><?= Yii::t('app', 'Management (Auth.)'); ?></a></li>
                                        </ul>
                                    </div>
                                </div><!-- /mainmenu-submenu-inner -->
                            </div><!-- /mainmenu-submenu -->
                        </li>
                    </ul>
                </nav>
    </div>
</div>
<div class="flag-color1">
</div>
<div class="flag-color2">
</div>
<div class="flag-color3">
</div>       
        <?= Breadcrumbs::widget([
            'homeLink' => [ 
                      'label' => Yii::t('yii', 'Management Apps'),
                      'url' => ['site/management'],
                 ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?=Alert::widget() ?>
        <?php 
           /* echo Growl::widget([
            'type' => Growl::TYPE_SUCCESS,
            'title' => '<h4>You do not have privilege for this action</h4>',
            'icon' => 'glyphicon glyphicon-info-sign',
            'body' => ,
            'showSeparator' => true,
            //'linkUrl' => 'index.php?r=files%2Findex',
            'delay' => 0,
            'pluginOptions' => [
                'delay' => 15000,
                'showProgressbar' => true,
                'placement' => [
                    'from' => 'top',
                    'align' => 'center',
                ]
            ]
        ]);*/
        ?>
        <?= $content ?>
<!-- <footer class="footer"> -->
    <!-- Footer -->
        <div class="footer">
            <div class="container">
                <div class="row">
                            <div class="col-footer col-md-3 col-xs-6">
                                <h3><?=Yii::t('app', 'Chief Justice Document'); ?></h3>
                                <div class="portfolio-item">
                                    <div class="video-wrapper">
                                        <img draggable="false" src="img/coa.jpg" alt="CoA">
                                    </div>
                                </div>
                            </div>
                            <div class="col-footer col-md-3 col-xs-6">
                                <h3>Resources Links</h3>
                                <ul class="no-list-style footer-navigate-section">
                                    <li><a href="#">Acts</a></li>
                                    <li><a href="#">Constitution Of Tanzania</a></li>
                                    <li><a href="#">Tanzania Official Website</a></li>
                                    <li><a href="#">The Office Of Attorney General</a></li>
                                    <li><a href="#">East Africa Court Of Justice</a></li>
                                    <li><a href="#">Law Reform Commission of Tanzania</a></li>
                                    <li><a href="#">Laws Of Tanzania from 2002-2012 </a></li>
                                    <li><a href="#">President Office Website </a></li>
                                    <li><a href="#"> Commission Of Human Rights</a></li>
                                    <li><a href="#">Judicial Service Commission </a></li>
                                    <li><a href="#">Constitutional Review Commission </a></li>
                                </ul>
                            </div>
                            
                            <div class="col-footer col-md-4 col-xs-6">
                                <h3>Contacts</h3>
                                <p class="contact-us-details">
                                    <b>Address:</b> 24 Kivukoni Road<br/>
                                    <b>P O Box:</b> S.L.P. 9004<br/>
                                    <b>Phone:</b> +255 22 2123897<br/>
                                    <b>Fax:</b> +255 22 2116654<br/>
                                    <b>Email:</b> <a href="info@judiciary.go.tz">info@judiciary.go.tz</a>
                                </p>
                            </div>
                            <div class="col-footer col-md-2 col-xs-6">
                                <h3>Stay Updated</h3>
                                <ul class="footer-stay-connected no-list-style">
                                    <li><a href="#" class="facebook"></a></li>
                                    <li><a href="#" class="twitter"></a></li>
                                    <li><a href="#" class="youtube"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="footer-copyright">&copy; JoT <?= date('Y') ?>. All rights reserved.</div>
                            </div>
                        </div>
                </div>
            </div>     
<!-- </footer> -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
