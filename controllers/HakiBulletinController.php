<?php

namespace app\controllers;

use Yii;
use app\models\HakiBulletin;
use app\models\ApartmentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * HakiBulletinController implements the CRUD actions for HakiBulletin model.
 */
class HakiBulletinController extends Controller
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
     * Lists all HakiBulletin models.
     * @return mixed
     */
    public function actionIndex()
    {
         if(Yii::$app->user->can('IO-MR'))
            {
            $searchModel = new ApartmentsSearch();
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
     * Displays a single HakiBulletin model.
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
     * This action is for displaying PDF files.
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
     * Creates a new HakiBulletin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         if(Yii::$app->user->can('IO-MR'))
            {
                $model = new HakiBulletin();

                if ($model->load(Yii::$app->request->post())) 
                {
                     //Get instance of Uploaded file
                    $model->photo = UploadedFile::getInstance($model, 'photo');
                    $model->document = UploadedFile::getInstance($model, 'document');
                    if ($model->photo != null && $model->document != null) {
                            $model->photo->saveAs( 'main_registry/haki_bulletin/' . str_replace(' ', '_', $model->photo->baseName) . '.' . $model->photo->extension );
                            $model->document->saveAs( 'main_registry/haki_bulletin/' . str_replace(' ', '_', $model->document->baseName) . '.' . $model->document->extension );

                            //Save the path to the db
                            $model->poster = 'main_registry/haki_bulletin/' . str_replace(' ', '_', $model->photo->baseName) . '.' . $model->photo->extension;
                            $model->attachment = '/main_registry/haki_bulletin/' . str_replace(' ', '_', $model->document->baseName) . '.' . $model->document->extension;
                            $model->time = date('Y-m-d');
                            $model->published_by = Yii::$app->user->id;
                            $model->save();
                           /* print_r($model->getErrors());
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
     * Updates an existing HakiBulletin model.
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
     * Deletes an existing HakiBulletin model.
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
     * Finds the HakiBulletin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HakiBulletin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HakiBulletin::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
