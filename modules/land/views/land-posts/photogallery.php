<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\models\Comments;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use app\modules\land\models\LandPosts;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = 'Photo Gallery';
/*$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>

<div class="posts-view">
<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1> <?=Yii::t('app', 'Photo Gallery') ?> </h1>
					</div>
				</div>
			</div>
		</div>
        
        <!-- Posts List -->
        <div class="section blog-posts-wrapper">
	    	<div class="container">
				<div class="row">
					<!-- Post -->
					<?php                         
		            $photos = LandPosts::find()->orderBy(['id' => SORT_DESC])->all();
		            if(!empty($photos))
		            {
		                foreach($photos as $photo)
		                {
                    echo 
					'<div class="col-md-4 col-sm-6">
						<div class="blog-post">
							<!-- Post Info -->
							<div class="post-info">
								<div class="post-date">
									<div class="date">'.$photo['time'].'</div>
								</div>
								<div class="post-comments-count">
									<a href=" '.Url::to(['land-posts/webview','id'=>$photo['id']]).' " title="Show Comments"><i class="glyphicon glyphicon-time icon-white"></i>Posted Time</a>
								</div>
							</div>
							<!-- End Post Info -->
							<!-- Post Image -->
							<a href=" '.Url::to(['land-posts/webview','id'=>$photo['id']]).' "><img src="'.$photo['attachment'].'" class="post-image" alt="Post Title"></a>
							<!-- End Post Image -->
							<!-- Post Title & Summary -->
							<div class="post-title">
								<h3><a href=" '.Url::to(['land-posts/webview','id'=>$photo['id']]).' ">'.$photo['title'].'</a></h3>
							</div>
							<!-- End Post Title & Summary -->
							<div class="post-more">
								<a href=" '.Url::to(['land-posts/webview','id'=>$photo['id']]).' " class="btn btn-small">View In Details</a>
							</div>
						</div>
					</div>'; }} ?>
					<!-- End Post -->
				</div>
			</div>
	    </div>
	    <!-- End Posts List -->

</div>