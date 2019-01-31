<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\modules\land\models\LandComments;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use app\modules\land\models\LandPosts;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = 'Post Details';
/*$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="posts-view">
     <!-- Page Title -->
        <div class="section section-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?=Yii::t('app', 'Post Details') ?></h1>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section">
            <div class="container">
                <div class="row">
                    <!-- Blog Post -->
                    <div class="col-sm-8">
                        <div class="blog-post blog-single-post">
                            <div class="single-post-title">
                                <h3><?= $model->title ?></h3>
                            </div>
                            <?php $comments = LandComments::find()->where(['post_id'=>$model->id])->all(); ?>
                            <div class="single-post-info">
                                <i class="glyphicon glyphicon-time"></i><?= $model->time ?> <a href="#" title="Show Comments"><i class="glyphicon glyphicon-comment"></i><?= count($comments) ?></a>
                            </div>
                            <div class="single-post-image">
                                <img src=<?= $model->attachment ?> alt="Photo Loading...">
                            </div>
                            <div class="single-post-content">
                                <h3>By <?= $model->author ?> <?= $model->time ?></h3>
                                <p>
                                    <?= $model->descriptions ?>
                                </p>
                            </div>
                            <!-- Comments -->
                            <div class="post-coments">
                                <h4><?= Yii::t('app', 'Comments'); ?> (<?= count($comments) ?>)</h4>
                                <ul class="post-comments">
                                    <?php                                                                
                                        if(!empty($comments))
                                            {
                                                foreach($comments as $comment)
                                                {
                                                echo 
                                                    '<li>
                                                        <div class="comment-wrapper">
                                                            <div class="comment-author"><img src="img/user1.png" alt="Photo Loading..."> '.$comment['username'].'</div>
                                                            <p>
                                                                '.$comment['comment'].'
                                                            </p>
                                                            <!-- Comment Controls -->
                                                            <div class="comment-actions">
                                                                <span class="comment-date">June 10th, 2013 3:16 pm</span>
                                                                <a href="#" data-toggle="tooltip" data-original-title="Vote Up" class="show-tooltip"><i class="glyphicon glyphicon-thumbs-up"></i></a>
                                                                <a href="#" data-toggle="tooltip" data-original-title="Vote Down" class="show-tooltip"><i class="glyphicon glyphicon-thumbs-down"></i></a>
                                                                <span class="label label-success">+8</span>
                                                                <a href="#" class="btn btn-micro btn-grey comment-reply-btn"><i class="glyphicon glyphicon-share-alt"></i> Reply</a>
                                                            </div>
                                                        </div>
                                                    </li>';}}
                                                    ?>

                                </ul>
                                <!-- Pagination -->
                                <div class="pagination-wrapper ">
                                    <ul class="pagination pagination-sm">
                                        <li class="disabled"><a href="#">Previous</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">Next</a></li>
                                    </ul>
                                </div>
                                <!-- Comments Form -->
                                <h4>Leave a Comment</h4>
                                <div class="comment-form-wrapper">
                                     <?php
                                     $comment = new LandComments();
                                     $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL,'action'=>['land-comments/create','id'=>$model->id]]);
                                        echo Form::widget([       // 1 column layout
                                            'model'=>$comment,
                                            'form'=>$form,
                                            'columns'=>1,
                                            'attributes'=>[
                                                'username'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter your name...']],
                                            ]
                                        ]);
                                            
                                        echo Form::widget([       // 1 column layout
                                            'model'=>$comment,
                                            'form'=>$form,
                                            'columns'=>1,
                                            'attributes'=>[
                                                'comment'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Type your comment...']],
                                            ]
                                        ]);    
                                                                     
                                         echo Form::widget([       // 2 column layout
                                            'model'=>$comment,
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
                                <!-- End Comment Form -->
                            </div>
                            <!-- End Comments -->
                        </div>
                    </div>
                    <!-- End Blog Post -->
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
                        <h4><?= Yii::t('app', 'Recent Posts'); ?></h4>
                        <ul class="recent-posts">
                            <?php    
                            $posts = LandPosts::find()->limit('10')->orderBy(['id' => SORT_DESC])->all();                                                            
                                 if(!empty($posts))
                                     {
                                         foreach($posts as $post)
                                            {
                                                echo 
                                                '<li><a href=" '.Url::to(['posts/webview','id'=>$post['id']]).' ">'.$post['title'].'</li>';
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
                </div>
            </div>
        </div>

</div>
