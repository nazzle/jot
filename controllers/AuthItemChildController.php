<?php

namespace app\controllers;

use Yii;
use app\models\AuthItemChild;
use app\models\AuthItemChildSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AuthItemChildController implements the CRUD actions for AuthItemChild model.
 */
class AuthItemChildController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all AuthItemChild models.
     * @return mixed
     */
    public function actionIndex()
    {
         if(Yii::$app->user->can('Administrator'))
            {
                $searchModel = new AuthItemChildSearch();
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
     * Displays a single AuthItemChild model.
     * @param string $parent
     * @param string $child
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($parent, $child)
    {
        if(Yii::$app->user->can('Administrator'))
            {
            return $this->render('view', [
                'model' => $this->findModel($parent, $child),
            ]);
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', "Sorry, you currently don't have privilege to this action."));
         }     
    }

    /**
     * Creates a new AuthItemChild model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('Administrator'))
            {
            $model = new AuthItemChild();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'parent' => $model->parent, 'child' => $model->child]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
         } else {
            throw new ForbiddenHttpException(Yii::t('yii', "Sorry, you currently don't have privilege to this action."));
         }     
    }

    /**
     * Updates an existing AuthItemChild model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $parent
     * @param string $child
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($parent, $child)
    {
     if(Yii::$app->user->can('Administrator'))
        {
            $model = $this->findModel($parent, $child);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'parent' => $model->parent, 'child' => $model->child]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
     } else {
            throw new ForbiddenHttpException(Yii::t('yii', "Sorry, you currently don't have privilege to this action."));
         }        
    }

    /**
     * Deletes an existing AuthItemChild model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $parent
     * @param string $child
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($parent, $child)
    {
    if(Yii::$app->user->can('Administrator'))
        {
            $this->findModel($parent, $child)->delete();

            return $this->redirect(['index']);
      } else {
            throw new ForbiddenHttpException(Yii::t('yii', "Sorry, you currently don't have privilege to this action."));
         }        
    }

    /**
     * Finds the AuthItemChild model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $parent
     * @param string $child
     * @return AuthItemChild the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($parent, $child)
    {
        if (($model = AuthItemChild::findOne(['parent' => $parent, 'child' => $child])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
