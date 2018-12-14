<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\models\Comments;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use app\models\Posts;
use app\models\Vacancies;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = Yii::t('app', 'Job Opportunities');
/*$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>

<div class="posts-view">
	<!-- Page Title -->
        <div class="section section-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?=Yii::t('app', 'Job Opportunities') ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
	    	<div class="container">
	    		<div class="row">
	    			<!-- Open Vacancies List -->
	    			<div class="col-md-12">
	    				<table class="jobs-list">
	    					<tr>
	    						<th>Position</th>
	    						<th>Duties</th>
	    						<th>Location</th>
	    						<th>Type</th>
	    						<th>How To Apply</th>
	    					</tr>
	    					<?php                          
		                  $vacancies = Vacancies::find()->all();
		                  if(!empty($vacancies))
		                  {
		                    foreach($vacancies as $vacancy)
		                    { echo '
	    					<tr>
	    						<!-- Position -->
	    						<td class="job-position">
	    							'.$vacancy['position'].'
	    						</td>
	    						<!-- Location -->
	    						<td class="job-location">
	    							<div class="job-country">'.$vacancy['duties'].'</div>
	    						</td>
	    						<!-- Job Type -->
	    						<td class="job-type hidden-phone">'.$vacancy['location'].'</td>
	    						<td class="job-type hidden-phone">'.$vacancy['type'].'</td>
	    						<td class="job-type hidden-phone">'.$vacancy['how_to_apply'].'</td>
	    					</tr> ';}} ?>

	    				</table>
	    			</div>
	    			<!-- End Open Vacancies List -->
	    		</div>
			</div>
		</div>
</div>