<?php

namespace app\modules\jdu\controllers;

use yii\web\Controller;

/**
 * Default controller for the `jdu` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    { 
    	$this->layout = 'jduLayout';
        return $this->render('index');
    }
}
