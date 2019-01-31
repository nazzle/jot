<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\models\Posts;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use yii\data\Pagination;
/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = Yii::t('app', 'Documents Folders');
/*$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="posts-view">

	<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1><?=Yii::t('app', 'Documents Folders'); ?></h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
	    		<div class="row">
	    								<div class="col-md-4 col-sm-6">
						<div class="portfolio-item">
							<div class="portfolio-image">
								<a href="#"><img src="img/filelogo.ico" alt="Document Folders"></a>
							</div>
							<div class="portfolio-info">
								<ul>
									<li class="portfolio-project-name"><?=Yii::t('app', 'REPORTS') ?> </li>
									<li><?=Yii::t('app', 'All Reports') ?> </li>
									<li class="read-more"><a href="#" class="btn"> <?=Yii::t('app', 'Open Folder') ?> </a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="portfolio-item">
							<div class="portfolio-image">
								<a href="#"><img src="img/filelogo.ico" alt="Document Folders"></a>
							</div>
							<div class="portfolio-info">
								<ul>
									<li class="portfolio-project-name"><?=Yii::t('app', 'COURT FORMS') ?></li>
									<li><?=Yii::t('app', 'All Court Forms') ?></li>
									<li class="read-more"><a href="#" class="btn"><?=Yii::t('app', 'Open Folder') ?></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="portfolio-item">
							<div class="portfolio-image">
								<a href="#"><img src="img/filelogo.ico" alt="Document Folders"></a>
							</div>
							<div class="portfolio-info">
								<ul>
									<li class="portfolio-project-name"><?=Yii::t('app', 'LAW DIGESTS') ?></li>
									<li><?=Yii::t('app', 'All Law Digests') ?></li>
									<li class="read-more"><a href="#" class="btn"><?=Yii::t('app', 'Open Folder') ?></a></li>
								</ul>
							</div>
						</div>
					</div>
	    		</div>
			</div>
		</div>

</div>