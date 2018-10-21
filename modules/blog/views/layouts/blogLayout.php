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
    <link rel="shortcut icon" href="<?= Yii::$app->params['rootPath']; ?>/favicon(1).ico" type="image/x-icon" />
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
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="email">
                        <a href="#"><i class="fa fa-envelope"></i>info@judiciary.go.tz</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="phone">
                        <a href="#"><i class="fa fa-phone"></i>+255 22 2123897</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 text-right">
                    <div class="social-icons">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
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
                        <li class="logo-wrapper"><a href="index.html"><img src="img/jot.jpg" alt="Judiciary Of Tanzania"></a></li>
                        <li class="active">
                            <a href="<?= Url::to(['/blog'])?>"><?= Yii::t('app', 'Judiciary Blog'); ?></a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/blog'])?>"><?= Yii::t('app', 'Home'); ?></a>
                        </li>
                        <li class="has-submenu">
                            <a href="#"><?= Yii::t('app', 'About'); ?></a>
                            <div class="mainmenu-submenu">
                                <div class="mainmenu-submenu-inner"> 
                                    <div>
                                        <h4>JUDICIARY ZONES</h4>
                                        <ul>
                                            <li><a href="index.html">Arusha Zone</a></li>
                                            <li><a href="index.html">Mbeya Zone</a></li>
                                            <li><a href="index.html">Morogoro Zone</a></li>
                                            <li><a href="index.html">Mwanza Zone</a></li>
                                        </ul>
                                    </div>
                                     <div>
                                        <h4>JUDICIARY UNITIES</h4>
                                        <ul>
                                            <li><a href="<?= Url::to(['/jdu'])?>">Judiciary Delivery Unity (JDU)</a></li>
                                            <li><a href="index.html">IJA</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <a href="<?= Url::to(['/site/home'])?>"><?= Yii::t('app', 'Visit Website'); ?></a>
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
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
<!-- <footer class="footer"> -->
    <!-- Footer -->
        <div class="footer">
            <div class="container">
                <div class="row">
                            <div class="col-footer col-md-3 col-xs-6">
                                <h3>JDU Portifolio</h3>
                                <div class="portfolio-item">
                                    <div class="portfolio-image">
                                        <a href="page-portfolio-item.html"><img src="img/portfolio6.jpg" alt="Project Name"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-footer col-md-3 col-xs-6">
                                <h3>Navigate</h3>
                                <ul class="no-list-style footer-navigate-section">
                                    <li><a href="page-blog-posts.html">Blog</a></li>
                                    <li><a href="page-portfolio-3-columns-2.html">Portfolio</a></li>
                                    <li><a href="page-products-3-columns.html">eShop</a></li>
                                    <li><a href="page-services-3-columns.html">Services</a></li>
                                    <li><a href="page-pricing.html">Pricing</a></li>
                                    <li><a href="page-faq.html">FAQ</a></li>
                                </ul>
                            </div>
                            
                            <div class="col-footer col-md-4 col-xs-6">
                                <h3>Contacts</h3>
                                <p class="contact-us-details">
                                    <b>Address:</b> 11th Floor, PPF Tower<br/>
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
