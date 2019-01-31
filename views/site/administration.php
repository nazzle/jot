<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Web Administration Page';
?>
<div class="site-index">

    <div class="container">

         <!-- Application buttons -->
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?= Yii::t('app', 'Administration Apps') ?></h3>
                </div>
                <div class="box-body">
                  <p>These <code>Application Buttons</code> provides you with variety of functions to perform as per your privileges:</p>
                  <a class="btn btn-app" href="<?=Url::to(['user/index']) ?>">
                    <i class="fa fa-group"></i> Users
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['auth-item/index']) ?>">
                    <i class="fa fa-list"></i> Authentication Items
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['auth-assignment/index']) ?>">
                    <i class="fa fa-map-signs"></i> Authentication Assignments
                  </a>
                  <a class="btn btn-app" href="<?=Url::to(['auth-item-child/index']) ?>">
                    <i class="fa fa-sort-amount-desc"></i> Authentication Child
                  </a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

    </div>
</div>
