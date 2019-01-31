<?php

namespace app\controllers;

use Yii;
use app\models\Comments;
use app\models\Posts;
use app\models\CommentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CommentsController implements the CRUD actions for Comments model.
 */
class CommentsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'update', 'delete'],
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
     * Lists all Comments models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('IO-MR'))
            {
            $searchModel = new CommentsSearch();
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
     * Displays a single Comments model.
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
     * Creates a new Comments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
            $model = new Comments();
            date_default_timezone_set("Africa/Dar_es_Salaam");

            if ($model->load(Yii::$app->request->post())) {
                $model->post_id = $id;
                $model->status = 1;
                $model->time = date('Y-m-d H:i:s');
                $model->save();
                return $this->redirect(['posts/webview', 'id' => $model->post_id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);      
    }

    /**
     * Updates an existing Comments model.
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
            throw new ForbiddenHttpException(Yii::t('yii', "Sorry, you currently don't have privilege to this action."));
        }     
    }

     /**
     * This action is for approving the new files created by users that have no Head privileges.
     */
    
    public function actionApprove($id)
    {
        $model = $this->findModel($id);
        
        if(Yii::$app->user->can('IO-MR')) 
     {   
            
            Yii::$app->db->createCommand()
                    ->update('comments', 
                            ['status' => 2,],['id' =>$id]
                    )->execute();
            return $this->redirect(['index']);
            
      } else {
            throw new ForbiddenHttpException(Yii::t('yii', "Sorry, you currently don't have privilege to this action."));
        }        
    
    }

    /**
     * Deletes an existing Comments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
         $model = $this->findModel($id);
        if(Yii::$app->user->can('IO-MR'))
        {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', "Sorry, you currently don't have privilege to this action."));
        }     
    }

    /**
     * Finds the Comments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
