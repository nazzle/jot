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

$this->title = Yii::t('app', 'All Posts');
/*$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="posts-view">

	<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1><?=Yii::t('app', 'All Posts'); ?></h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<!-- Promotion Code -->
					<div class="col-md-4  col-md-offset-0 col-sm-6 col-sm-offset-6">
						<div class="cart-promo-code">
							<h6><i class="fa fa-filter"></i> Filter Posts By</h6>
							<div class="input-group">
								<input class="form-control input-sm" id="appendedInputButton" type="text" value="">
								<span class="input-group-btn">
									<button class="btn btn-sm btn-grey" type="button">Key Word</button>
								</span>
							</div>
						</div>
					</div>
					<!-- Shipment Options -->
					<div class="col-md-2 col-md-offset-0 col-sm-6 col-sm-offset-6">
						<div class="cart-shippment-options">
							<h6><i class="fa fa-calendar"></i> Date From</h6>
							<div class="input-append">
								<select class="form-control input-sm">
									<option value="1">All Posts</option>
									<option value="2">Today</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-md-offset-0 col-sm-6 col-sm-offset-6">
						<div class="cart-shippment-options">
							<h6><i class="fa fa-calendar"></i> Date To</h6>
							<div class="input-append">
								<select class="form-control input-sm">
									<option value="1">All Posts</option>
									<option value="2">Today</option>
								</select>
							</div>
						</div>
					</div>
					
					<!-- Shopping Cart Totals -->
					<div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
						<!-- Action Buttons -->
						<div class="pull-right">
							<a href="<?=Url::to(['posts/allwebposts']) ?>" class="btn btn-grey"><i class="glyphicon glyphicon-refresh"></i> REFRESH</a>
							<a href="#" class="btn"><i class="fa fa-bell icon-white"></i> SUBSCRIBE</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<!-- Shopping Cart Items -->
						<table class="shopping-cart">
							<!-- Shopping Cart Item -->

					<?php
	                  $posts = new Posts;                          
	                  $rows = Posts::find()->orderBy(['id' => SORT_DESC])->all();
	                  if(!empty($rows))
	                  {
	                    foreach($rows as $row)
	                    {
	                        $link = Url::to(['posts/webview','id'=>$row['id']]);
	                        echo 
								'<tr>
									<!-- Shopping Cart Item Image -->
									<td class="image"><a href=" '.$link.' "><img src=" '.$row['attachment'].' " alt="Post Photo"></a></td>
									<!-- Shopping Cart Item Description & Features -->
									<td>
										<div class="cart-item-title"><a href="'.$link.'">'.$row['title'].'</a></div>
									</td>
									<!-- Shopping Cart Item Price -->
									<td class="price">'.$row['time'].'</td>
									<!-- Shopping Cart Item Actions -->
									<td class="actions">
										<a href="'.$link.'" class="btn btn-xs btn-grey"><i class="fa fa-eye"></i> View Post</a>
									</td>
								</tr>'; 
						}
					} 
					?>


							<!-- End Shopping Cart Item -->
						</table>
						<!-- End Shopping Cart Items -->
					</div>
				</div>
			</div>
		</div>

</div>