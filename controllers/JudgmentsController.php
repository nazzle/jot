<?php

namespace app\controllers;

use Yii;
use app\models\Judgments;
use app\models\JudgmentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * JudgmentsController implements the CRUD actions for Judgments model.
 */
class JudgmentsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete', 'uploadjudgment'],
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
     * Lists all Judgments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JudgmentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     /**
     * Lists Court of Appeal CauseList models for unauthorized users on web.
     * @return mixed
     */
    public function actionAppeal()
    {
        $searchModel = new JudgmentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['division'=>1]);

        return $this->render('coa', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     /**
     * Lists Court of Appeal CauseList models for unauthorized users on web.
     * @return mixed
     */
    public function actionMainregistry()
    {
        $searchModel = new JudgmentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['division'=>2]);

        return $this->render('mainregistry', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     /**
     * Lists Court of Appeal CauseList models for unauthorized users on web.
     * @return mixed
     */
    public function actionLand()
    {
        $searchModel = new JudgmentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['division'=>3]);

        return $this->render('land', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Judgments models.
     * @return mixed
     */
    public function actionWeblist()
    {
        $searchModel = new JudgmentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('weblist', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Judgments model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Judgments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionUploadjudgment()
    {
        $model = new Judgments();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

     /**
     * Creates a new Judgments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('CMO'))
            {
            $model = new Judgments();

            date_default_timezone_set("Africa/Dar_es_Salaam");

            if ($model->load(Yii::$app->request->post())) 
            {
                 //Get instance of Uploaded file
                $model->judgment = UploadedFile::getInstance($model, 'judgment');
                if ($model->judgment != null) {

                    if ($model->judgment->extension == 'pdf') {
                        $model->judgment->saveAs( 'main_registry/judgments/' . str_replace(' ', '_', $model->judgment->baseName) . '.' . $model->judgment->extension );

                       //Save the path to the db
                        $model->attachment = '/main_registry/judgments/' . str_replace(' ', '_', $model->judgment->baseName) . '.' . $model->judgment->extension;
                        $model->time = date('Y-m-d');
                        $model->published_by = Yii::$app->user->id;
                        $model->save();
                       /* print_r($model->getErrors());
                        die();*/

                        return $this->redirect(['judgments/index']);

                    }else {
                     return $this->render('errorForm', [
                        'model' => $model,
                     ]);
                     }      

                }else {
                       $model->time = date('Y-m-d');
                       $model->published_by = Yii::$app->user->id;
                       $model->save();
                       return $this->redirect(['view', 'id' => $model->id]); 
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
     * Updates an existing Judgments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Judgments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Judgments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Judgments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Judgments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
