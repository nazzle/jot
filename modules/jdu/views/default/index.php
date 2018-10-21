<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CauseListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'JDU').' | '.Yii::t('app', 'Home');
/*$this->params['breadcrumbs'][] = $this->title;*/
?>
        <div class="section section-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>We are leading company</h3>
                        <p>
                            Donec elementum mi vitae enim fermentum lobortis. In hac habitasse platea dictumst. Ut pellentesque, orci sed mattis consequat, libero ante lacinia arcu, ac porta lacus urna in lorem. Praesent consectetur tristique augue, eget elementum diam suscipit id.
                        </p>
                        <h3>Wide range of services</h3>
                        <p>
                            Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam condimentum laoreet sagittis. Duis quis ullamcorper leo. Suspendisse potenti.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="video-wrapper">
                            <iframe src="uploads/jaji.mp4" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <h2>Our Work</h2>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="portfolio-item">
                            <div class="portfolio-image">
                                <a href="page-portfolio-item.html"><img src="img/portfolio1.jpg" alt="Project Name"></a>
                            </div>
                            <div class="portfolio-info">
                                <ul>
                                    <li class="portfolio-project-name">Project Name</li>
                                    <li>Website design & Development</li>
                                    <li>Client: Some Client LTD</li>
                                    <li class="read-more"><a href="page-portfolio-item.html" class="btn">Read more</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="portfolio-item">
                            <div class="portfolio-image">
                                <a href="page-portfolio-item.html"><img src="img/portfolio2.jpg" alt="Project Name"></a>
                            </div>
                            <div class="portfolio-info">
                                <ul>
                                    <li class="portfolio-project-name">Project Name</li>
                                    <li>Website design & Development</li>
                                    <li>Client: Some Client LTD</li>
                                    <li class="read-more"><a href="page-portfolio-item.html" class="btn">Read more</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="portfolio-item">
                            <div class="portfolio-image">
                                <a href="page-portfolio-item.html"><img src="img/portfolio3.jpg" alt="Project Name"></a>
                            </div>
                            <div class="portfolio-info">
                                <ul>
                                    <li class="portfolio-project-name">Project Name</li>
                                    <li>Website design & Development</li>
                                    <li>Client: Some Client LTD</li>
                                    <li class="read-more"><a href="page-portfolio-item.html" class="btn">Read more</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="portfolio-item">
                            <div class="portfolio-image">
                                <a href="page-portfolio-item.html"><img src="img/portfolio4.jpg" alt="Project Name"></a>
                            </div>
                            <div class="portfolio-info">
                                <ul>
                                    <li class="portfolio-project-name">Project Name</li>
                                    <li>Website design & Development</li>
                                    <li>Client: Some Client LTD</li>
                                    <li class="read-more"><a href="page-portfolio-item.html" class="btn">Read more</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="portfolio-item">
                            <div class="portfolio-image">
                                <a href="page-portfolio-item.html"><img src="img/portfolio5.jpg" alt="Project Name"></a>
                            </div>
                            <div class="portfolio-info">
                                <ul>
                                    <li class="portfolio-project-name">Project Name</li>
                                    <li>Website design & Development</li>
                                    <li>Client: Some Client LTD</li>
                                    <li class="read-more"><a href="page-portfolio-item.html" class="btn">Read more</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="portfolio-item">
                            <div class="portfolio-image">
                                <a href="page-portfolio-item.html"><img src="img/portfolio6.jpg" alt="Project Name"></a>
                            </div>
                            <div class="portfolio-info">
                                <ul>
                                    <li class="portfolio-project-name">Project Name</li>
                                    <li>Website design & Development</li>
                                    <li>Client: Some Client LTD</li>
                                    <li class="read-more"><a href="page-portfolio-item.html" class="btn">Read more</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="section">
            <div class="container">
                <h2>Management and Staffs</h2>
                <div class="row">
                    <!-- Testimonial -->
                    <div class="testimonial col-md-4 col-sm-6">
                        <!-- Author Photo -->
                        <div class="author-photo">
                            <img src="img/user1.jpg" alt="Author 1">
                        </div>
                        <div class="testimonial-bubble">
                            <blockquote>
                                <!-- Quote -->
                                <p class="quote">
                                    "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut."
                                </p>
                                <!-- Author Info -->
                                <cite class="author-info">
                                    - Name Surname,<br>Managing Director at <a href="#">Some Company</a>
                                </cite>
                            </blockquote>
                            <div class="sprite arrow-speech-bubble"></div>
                        </div>
                    </div>
                    <!-- End Testimonial -->
                    <div class="testimonial col-md-4 col-sm-6">
                        <div class="author-photo">
                            <img src="img/user5.jpg" alt="Author 2">
                        </div>
                        <div class="testimonial-bubble">
                            <blockquote>
                                <p class="quote">
                                    "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo."
                                </p>
                                <cite class="author-info">
                                    - Name Surname,<br>Managing Director at <a href="#">Some Company</a>
                                </cite>
                            </blockquote>
                            <div class="sprite arrow-speech-bubble"></div>
                        </div>
                    </div>
                    <div class="testimonial col-md-4 col-sm-6">
                        <div class="author-photo">
                            <img src="img/user2.jpg" alt="Author 3">
                        </div>
                        <div class="testimonial-bubble">
                            <blockquote>
                                <p class="quote">
                                    "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."
                                </p>
                                <cite class="author-info">
                                    - Name Surname,<br>Managing Director at <a href="#">Some Company</a>
                                </cite>
                            </blockquote>
                            <div class="sprite arrow-speech-bubble"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Testimonials -->
