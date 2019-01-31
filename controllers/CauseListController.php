<?php

namespace app\controllers;

use Yii;
use app\models\CauseList;
use app\models\CauseListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * CauseListController implements the CRUD actions for CauseList model.
 */
class CauseListController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete', 'uploadexcel'],
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
     * Lists all CauseList models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('IO-MR'))
            {
            $searchModel = new CauseListSearch();
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
     * Lists all CauseList models for unauthorized users on web.
     * @return mixed
     */
    public function actionWeblist()
    {
        $searchModel = new CauseListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('weblist', [
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
        $searchModel = new CauseListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('appeal', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     /**
     * Lists High Court Main Registry CauseList models for unauthorized users on web.
     * @return mixed
     */
    public function actionHc()
    {
        $searchModel = new CauseListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('hc', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CauseList model.
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
     * Creates a new CauseList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('IO-MR'))
            {
            $model = new CauseList();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
         } else {
            throw new ForbiddenHttpException(Yii::t('yii', "Sorry, you currently don't have privilege to this action."));
        }       
    }

    /**
    * Here we are going to define the aaction that will be uploading the excel
    * file to the database
    **/
    public function actionUploadexcel()
    {
        if(Yii::$app->user->can('IO-MR'))
            {
                $model = new CauseList();

                if ($model->load(Yii::$app->request->post())) {

                       //Get instance of Uploaded file
                        $model = new CauseList();
                        $model->excel = UploadedFile::getInstance($model, 'excel');
                        if ($model->excel != null) {
                                $model->excel->saveAs( 'main_registry/cause_lists/' . str_replace(' ', '_', $model->excel->baseName) . '.' . $model->excel->extension );
                                $inputFile = 'main_registry/cause_lists/' . str_replace(' ', '_', $model->excel->baseName) . '.' . $model->excel->extension;
                            try{
                                $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
                                $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                                $objPHPExcel = $objReader->load($inputFile);
                            } catch (Exception $e) {
                                die('Error');
                            }

                            $sheet = $objPHPExcel->getSheet(0);
                            $highestRow = $sheet->getHighestRow();
                            $highestColumn = $sheet->getHighestColumn();

                            for($row=1; $row <= $highestRow; $row++)
                            {
                                $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);

                                if($row==1)
                                {
                                    continue;
                                }

                                $causelists = new CauseList();
                                $causelists->dates = $rowData[0][0]; 
                                $causelists->case_number  = $rowData[0][1]; 
                                $causelists->parties  = $rowData[0][2]; 
                                $causelists->witness  = $rowData[0][3]; 
                                $causelists->advocate_plaintiff  = $rowData[0][4]; 
                                $causelists->advocate_defendant  = $rowData[0][5]; 
                                $causelists->division  = $rowData[0][6]; 
                                $causelists->save();

                                //print_r($causelists->getErrors());
                            }
                           // die('okay');


                            return $this->redirect(['cause-list/index']);
                            }else {
                                        return $this->render('uploadexcel', [
                                        'model' => $model,
                                          ]);
                                   }   
                }

                return $this->renderAjax('uploadexcel', [
                    'model' => $model,
                ]);
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', "Sorry, you currently don't have privilege to this action."));
        }           
    }

    /**
     * Updates an existing CauseList model.
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
     * Deletes an existing CauseList model.
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
     * Finds the CauseList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CauseList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CauseList::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
