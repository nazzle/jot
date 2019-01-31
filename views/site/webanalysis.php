<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\models\Comments;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use app\models\Posts;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = 'Website Analysis';
$this->params['breadcrumbs'][] = $this->title;
/*$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="posts-view">
        
        <div class="section">
            <div class="container">
                    <div class="row">
                         <h2>Users per Week</h2>
                        <iframe width="373.5" height="230.9475" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSUIPC-s4jMGhpW5LeNDohf-fH2xPHJjbwiBtrIDECGjV1s6mTbPKogkYi111z_ljFJc1dRV3jd0NeE/pubchart?oid=905080257&amp;format=interactive"></iframe>
                    </div>  
                    <div class="row">
                        <h2>Users per Countries</h2>
                       <iframe width="601.5" height="371.9275" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSUIPC-s4jMGhpW5LeNDohf-fH2xPHJjbwiBtrIDECGjV1s6mTbPKogkYi111z_ljFJc1dRV3jd0NeE/pubchart?oid=644822448&amp;format=interactive"></iframe>
                    </div>     
            </div>
        </div>

</div>
