<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Management Page';
?>
<div class="site-index">

    <div class="container">

      <?php
      /*
        * Notification queries;
        */
    
        $pending_comments = (new yii\db\Query())
        ->from('comments')
        ->where(['status' => 1])
        ->count();

      ?>

         <!-- Application buttons -->
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?= Yii::t('app', 'Management Apps') ?></h3>
                </div>
                <div class="box-body">
                  <p>These <code>Application Buttons</code> provides you with variety of functions to perform as per your privileges:</p>
                  <a class="btn btn-app" href="<?=Url::to(['posts/index']) ?>">
                    <i class="fa fa-edit"></i> Posts/Stories
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['judgments/index']) ?>">
                    <i class="fa fa-balance-scale"></i> Judgments
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['cause-list/index']) ?>">
                    <i class="fa fa-list"></i> Cause Lists
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['announcements/index']) ?>">
                    <i class="fa fa-bullhorn"></i> Announcements
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['user-responses/index']) ?>">
                    <i class="fa fa-envelope"></i> Feedbacks
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['comments/index']) ?>">
                     <?= $pending_comments > 0? '<span class="badge bg-yellow">'. $pending_comments.'</span>' : ''; ?>                   
                    <i class="fa  fa-mail-reply-all"></i> Posts Comments
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['useful-attachments/index']) ?>">
                    <i class="fa  fa-paperclip"></i> Attachments
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['vacancies/index']) ?>">
                    <i class="fa  fa-sticky-note-o"></i> Vacancies
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['site/administration']) ?>">
                    <i class="fa fa-gears"></i> Web Administartion
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['site/webanalysis']) ?>">
                    <i class="fa fa-map"></i> Website Analysis
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['who-is-who/index']) ?>">
                    <i class="fa fa-users"></i> Who Is Who
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['tenders/index']) ?>">
                    <i class="fa fa-clipboard"></i> Tenders
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['faqs/index']) ?>">
                    <i class="fa fa-clipboard"></i> FAQs
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['haki-bulletin/index']) ?>">
                    <i class="fa fa-clipboard"></i> HAKI BULLETIN
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['judicial-staffs/index']) ?>">
                    <i class="fa fa-legal"></i> Judges
                  </a> 
                  <a class="btn btn-app" href="<?=Url::to(['judiciary-designations/index']) ?>">
                    <i class="fa fa-sort-amount-desc"></i> Designations
                  </a> 
                   <a class="btn btn-app" href="<?=Url::to(['staff-profile/index']) ?>">
                    <i class="fa fa-book"></i> Staff Profile
                  </a> 
                  <a class="btn btn-app" href="#">
                    <i class="fa fa-user"></i> Your Profile
                  </a>                   
                </div><!-- /.box-body -->
              </div><!-- /.box -->

    </div>
</div>
