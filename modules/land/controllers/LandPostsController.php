<?php

namespace app\modules\land\controllers;

use Yii;
use app\modules\land\models\LandPosts;
use app\modules\land\models\LandPostsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * LandPostsController implements the CRUD actions for LandPosts model.
 */
class LandPostsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all LandPosts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'landLayout';
        $searchModel = new LandPostsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LandPosts model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'landLayout';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new LandPosts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'landLayout';
        $model = new LandPosts();
        date_default_timezone_set("Africa/Dar_es_Salaam");

        if ($model->load(Yii::$app->request->post())) 
        {
            //Getting file instance
            $model->photo = UploadedFile::getInstance($model, 'photo');               
            $model->photo->saveAs( 'land_division/posts/' . str_replace(' ', '_', $model->photo->baseName) . '.' . $model->photo->extension );

            //Then saving the model and file location in the database.
            //Save the path to the db
            $model->attachment = 'land_division/posts/' . str_replace(' ', '_', $model->photo->baseName) . '.' . $model->photo->extension;
            $model->time = date('y-m-d h:m:s');
            $model->location_id = 2;
            $model->status = 'Pending';
            $model->author = 1;
            $model->save();
            /*print_r($model->getErrors());
            die();*/

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
    *This Action is for rendering Land division post views for website visitors
    */
    public function actionWebview($id)
    {
        $this->layout = 'landLayout';

        return $this->render('webview', [
            'model' => $this->findModel($id),
        ]);
    }

     /**
    *This action renders the photo gallery
    **/
    public function actionPhotogallery()
    {
        $this->layout ='landLayout';
        
        return $this->render('photogallery');
    }

    /**
     * Updates an existing LandPosts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'landLayout';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LandPosts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->layout = 'landLayout';
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LandPosts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LandPosts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LandPosts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
