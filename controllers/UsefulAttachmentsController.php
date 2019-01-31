<?php

namespace app\controllers;

use Yii;
use app\models\UsefulAttachments;
use app\models\UsefulAttachmentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * UsefulAttachmentsController implements the CRUD actions for UsefulAttachments model.
 */
class UsefulAttachmentsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete', 'errorForm'],
                'rules' => [
                    [
                        //'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UsefulAttachments models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('IO-MR'))
           {
                $searchModel = new UsefulAttachmentsSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', "Sorry, you currently don't have privilege to this action."));
        }         
    }

    /**
     * Displays a single UsefulAttachments model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('IO-MR'))
           {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', "Sorry, you currently don't have privilege to this action."));
        }     
    }

    /**
     * Creates a new UsefulAttachments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('IO-MR'))
           {
                $model = new UsefulAttachments();

                date_default_timezone_set("Africa/Dar_es_Salaam");

                if ($model->load(Yii::$app->request->post())) 
                {

                    //Get instance of Uploaded file
                    $model->file = UploadedFile::getInstance($model, 'file'); 
                    if ($model->file != null) {              
                        $model->file->saveAs( 'main_registry/useful_attachments/' . str_replace(' ', '_', $model->file->baseName) . '.' . $model->file->extension );

                        //Save the path to the db
                        $model->attachment = '/main_registry/useful_attachments/' . str_replace(' ', '_', $model->file->baseName) . '.' . $model->file->extension;
                        $model->upload_time = date('y-m-d');
                        $model->save();
                        /*print_r($model->getErrors());
                        die();*/
                        
                        return $this->redirect(['view', 'id' => $model->id]);
                    }else {
                        return $this->render('errorForm', [
                        'model' => $model,
                    ]);
                   }          
                }

                return $this->render('create', [
                    'model' => $model,
                ]);
         } else {
            throw new ForbiddenHttpException(Yii::t('yii', "Sorry, you currently don't have privilege to this action."));
        }         
    }

     /**
     * this returns an error form when use mistakenly submit wrong details.
     * or submit empty form.
     * @return string
     */
    public function actionErrorForm()
    {
        
        return $this->render('errorForm');
    }

    /**
     * Updates an existing UsefulAttachments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->user->can('IO-MR'))
           {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
         } else {
            throw new ForbiddenHttpException(Yii::t('yii', "You can edit only the attachments that you published."));
        }     
    }

    /**
     * Deletes an existing UsefulAttachments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('IO-MR'))
           {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
         } else {
            throw new ForbiddenHttpException(Yii::t('yii', "You can delete only the attachments that you published."));
        }     
    }

    /**
     * Finds the UsefulAttachments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UsefulAttachments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UsefulAttachments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
