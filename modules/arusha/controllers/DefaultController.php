<?php

namespace app\modules\arusha\controllers;

use yii\web\Controller;

/**
 * Default controller for the `ArushaZone` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
    	$this->layout = 'arushaLayout';
        return $this->render('index');
    }
}
