<?php

namespace app\controllers;

use Yii;
use app\models\Posts;
use app\models\PostsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
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
     * Lists all Posts models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('IO-MR'))
        {
            $searchModel = new PostsSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->setSort([
                            'attributes' => [
                                'id' => [
                                    'asc' => ['id' => SORT_ASC],
                                    'desc' => ['id' => SORT_DESC],
                                    'default' => SORT_DESC,
                                ],
                                
                                'time' => [
                                    'asc' => ['id' => SORT_ASC],
                                    'desc' => ['id' => SORT_DESC],
                                    'default' => SORT_DESC
                                ],
                                
                            ],
                            'defaultOrder' => [
                                'id' => SORT_DESC,
                                'time' => SORT_DESC,
                            ]
                        ]);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', "Sorry, you currently don't have privilege to this action."));
        }     
    }

    /**
     * Displays a single Posts model.
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
    *This action renders the photo gallery
    **/
    public function actionPhotogallery()
    {
        return $this->render('photogallery');
    }

    /**
     * Displays a single Posts model for non authenticated users.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionWebview($id)
    {
        return $this->render('webview', [
            'model' => $this->findModel($id),
        ]);
    }

     /**
    *This action renders page tha displays all posts
    **/
    public function actionAllwebposts()
    {
        return $this->render('allwebposts');
    }

    /**
     * Creates a new Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('IO-MR'))
        {
            $model = new Posts();
            date_default_timezone_set("Africa/Dar_es_Salaam");

            if ($model->load(Yii::$app->request->post())) 
            {
                //Get instance of Uploaded file
                $model->photo = UploadedFile::getInstance($model, 'photo');
                if ($model->photo != null) {
                        $model->photo->saveAs( 'main_registry/posts/' . str_replace(' ', '_', $model->photo->baseName) . '.' . $model->photo->extension );

                        //Save the path to the db
                        $model->attachment = 'main_registry/posts/' . str_replace(' ', '_', $model->photo->baseName) . '.' . $model->photo->extension;
                        $model->time = date('Y-m-d');
                        $model->author = Yii::$app->user->id;
                        $model->save();
                      /*  print_r($model->getErrors());
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
     * Updates an existing Posts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->user->can('IO-MR') && Yii::$app->user->id == $model->author)
        {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
         } else {
            throw new ForbiddenHttpException(Yii::t('yii', "You can edit only the post that you published."));
        }      
    }

    /**
     * Deletes an existing Posts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
         $model = $this->findModel($id);
        if(Yii::$app->user->can('IO-MR') && Yii::$app->user->id == $model->author)
        {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', "You can delete only the posts that you published."));
        }     
    }

    /**
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
