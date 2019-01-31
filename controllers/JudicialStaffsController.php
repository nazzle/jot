<?php

namespace app\controllers;

use Yii;
use app\models\JudicialStaffs;
use app\models\JudicialStaffsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * JudicialStaffsController implements the CRUD actions for JudicialStaffs model.
 */
class JudicialStaffsController extends Controller
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
     * Lists all JudicialStaffs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JudicialStaffsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JudicialStaffs model.
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
     * Creates a new JudicialStaffs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JudicialStaffs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

     /**
    * Here we are going to define the aaction that will be uploading the excel
    * file to the database
    **/
    public function actionUploadexcel()
    {
        if(Yii::$app->user->can('IO-MR'))
            {
                $model = new JudicialStaffs();

                if ($model->load(Yii::$app->request->post())) {

                       //Get instance of Uploaded file
                        $model = new JudicialStaffs();
                        $model->excel = UploadedFile::getInstance($model, 'excel');
                        if ($model->excel != null) {
                                $model->excel->saveAs( 'main_registry/judicial_staffs/' . str_replace(' ', '_', $model->excel->baseName) . '.' . $model->excel->extension );
                                $inputFile = 'main_registry/judicial_staffs/' . str_replace(' ', '_', $model->excel->baseName) . '.' . $model->excel->extension;
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

                                $causelists = new JudicialStaffs();
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


                            return $this->redirect(['judicial-staffs/index']);
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
     * Updates an existing JudicialStaffs model.
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
     * Deletes an existing JudicialStaffs model.
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
     * Finds the JudicialStaffs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JudicialStaffs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JudicialStaffs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
