<?php

namespace app\modules\land\controllers;

use yii\web\Controller;

/**
 * Default controller for the `land` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
    	$this->layout = 'landLayout';
        return $this->render('index');
    }

    /**
    *This action is for land division staff in managing their division website subdomain
    **/
    public function actionManagement()
    {
    	$this->layout = 'landLayout';

    	return $this->render('management');
    }
}
