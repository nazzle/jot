<?php

namespace app\controllers;

use Yii;
use app\models\Announcements;
use app\models\AnnouncementsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * AnnouncementsController implements the CRUD actions for Announcements model.
 */
class AnnouncementsController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Announcements models.
     * @return mixed
     */
    public function actionIndex()
    {
         if(Yii::$app->user->can('IO-MR'))
            {
                $searchModel = new AnnouncementsSearch();
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
     * Displays a single Announcements model.
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
     * Displays statistics ib details.
     *
     * @return string
     */
    public function actionPdf($id)
    {
        
        return $this->render('viewPDF',[
            'id' => $id,
        ]);
    }

    /**
     * Creates a new Announcements model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('IO-MR'))
            {
            $model = new Announcements();

            date_default_timezone_set("Africa/Dar_es_Salaam");

            if ($model->load(Yii::$app->request->post())) 
            {
                 //Get instance of Uploaded file
                $model->file = UploadedFile::getInstance($model, 'file');
                if ($model->file != null) {               
                    $model->file->saveAs( 'main_registry/announcements/' . str_replace(' ', '_', $model->file->baseName) . '.' . $model->file->extension );

                    //Save the path to the db
                    if ($model->file->extension == 'pdf' && $model->type == 'With Attachment') {
                        # code...
                        $model->attachment = '/main_registry/announcements/' . str_replace(' ', '_', $model->file->baseName) . '.' . $model->file->extension;
                    }elseif ($model->file->extension == 'jpg' && $model->type == 'With Poster') {
                        $model->attachment = 'main_registry/announcements/' . str_replace(' ', '_', $model->file->baseName) . '.' . $model->file->extension;
                    }else {
                        return $this->render('errorForm', [
                            'model' => $model,
                            ]);
                    }
                    //$model->attachment = '/main_registry/announcements/' . str_replace(' ', '_', $model->file->baseName) . '.' . $model->file->extension;
                    $model->time = date('Y-m-d');
                    $model->published_by = Yii::$app->user->id;
                    $model->location = 2;
                    $model->save();
                    /*print_r($model->getErrors());
                    die();*/

                    return $this->redirect(['announcements/index']);
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
     * This action returns a form with errors when a user mistakenly submitt wrong inputs.
     *
     * @return string
     */
    public function actionErrorForm()
    {
        
        return $this->render('errorForm');
    }

    /**
     * Updates an existing Announcements model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
         if(Yii::$app->user->can('IO-MR') && Yii::$app->user->id == $model->published_by)
            {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', "You can edit only the announcements that you published."));
        }      
    }

    /**
     * Deletes an existing Announcements model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
         if(Yii::$app->user->can('IO-MR') && Yii::$app->user->id == $model->published_by)
            {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', "You can delete only the announcements that you published."));
        }        
    }

    /**
     * Finds the Announcements model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Announcements the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Announcements::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
