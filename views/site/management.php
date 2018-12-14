<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Management Page';
?>
<div class="site-index">

    <div class="container">

         <!-- Application buttons -->
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?= Yii::t('app', 'Management Apps') ?></h3>
                </div>
                <div class="box-body">
                  <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a></code> tag to achieve the following:</p>
                  <a class="btn btn-app" href="<?=Url::to(['posts/index']) ?>">
                    <i class="fa fa-edit"></i> Posts
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['judgments/index']) ?>">
                    <i class="fa fa-inbox"></i> Judgments
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['cause-list/index']) ?>">
                    <i class="fa fa-list"></i> Cause Lists
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['announcements/index']) ?>">
                    <i class="fa fa-bullhorn"></i> Announcements
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['user-responses/index']) ?>">
                    <i class="fa fa-envelope"></i> User Responses
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['useful-attachments/index']) ?>">
                    <span class="badge bg-yellow">3</span>
                    <i class="fa fa-reply"></i> Attachments
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['vacancies/index']) ?>">
                    <span class="badge bg-green">300</span>
                    <i class="fa  fa-sticky-note-o"></i> Vacancies
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['zones/index']) ?>">
                    <span class="badge bg-purple">891</span>
                    <i class="fa fa-compass"></i> Zones
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['divisions/index']) ?>">
                    <span class="badge bg-teal">67</span>
                    <i class="fa fa-code-fork"></i> Divisions
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['website-analysis/index']) ?>">
                    <span class="badge bg-aqua">12</span>
                    <i class="fa fa-map"></i> Website Analysis
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['who-is-who/index']) ?>">
                    <span class="badge bg-red">531</span>
                    <i class="fa fa-users"></i> Who Is Who
                  </a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

    </div>
</div>
