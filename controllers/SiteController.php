<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SourceMessageSearch;
use app\models\ContactForm;
use app\models\Posts;
use Da\QrCode\QrCode;
use app\models\UsefulAttachments;
use app\models\SignupForm;
use yii\web\ForbiddenHttpException;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['home', 'view', 'create', 'update', 'delete', 'qr', 'management', 'signup', 'administration'],
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
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SourceMessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('home', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionAdministration()
    {
        if(Yii::$app->user->can('Administrator'))
            {
                 return $this->render('administration');
         } else {
            throw new ForbiddenHttpException(Yii::t('yii', "Sorry, you currently don't have privilege to this action."));
        }             
    }

     /**
     * Displays website analysis page.
     *
     * @return string
     */
    public function actionWebanalysis()
    {
        if(Yii::$app->user->can('Administrator'))
            {
                 return $this->render('webanalysis');
         } else {
            throw new ForbiddenHttpException(Yii::t('yii', "Sorry, you currently don't have privilege to this action."));
        }             
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionQr()
    {
    $qrCode = (new QrCode('Hii ni nakala halali ya Mahakama ya Tanzania.'))
    ->setSize(100)
    ->setMargin(5)
    ->useForegroundColor(51, 153, 255);

    // display directly to the browser 
    header('Content-Type: '.$qrCode->getContentType());
    echo $qrCode->writeString();

die();
        return $this->render('qr');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionHome()
    {
        return $this->render('management');
    }

    /**
     * Displays statistics ib details.
     *
     * @return string
     */
    public function actionStatistics()
    {
        return $this->render('statistics');
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
     * This action is for displaying documents folders.
     *
     * @return string
     */
    public function actionFolders()
    {
        
        return $this->render('folders');
    }

    /**
    *This action updates the number of likes for the post
    * @return interger
    **/
    public function actionLikes($id)
    {
        $posts = new Posts();
        $cell = Posts::find()->where(['id'=>$id])->all();
        foreach ($cell as $cell) {

            Yii::$app->db->createCommand()
                    ->update('posts', 
                            ['likes' => $cell['likes'] + 1],['id' =>$id]
                    )->execute();
        }

         return $this->render('home');           
        
    }
//===============================================================================================
// Dislike increment method
        /**
    *This action updates the number of likes for the post
    * @return interger
    **/
//===============================================================================================

    public function actionDislikes($id)
    {
        $posts = new Posts();
        $cell = Posts::find()->where(['id'=>$id])->all();
        foreach ($cell as $cell) {

            Yii::$app->db->createCommand()
                    ->update('posts', 
                            ['dislikes' => $cell['dislikes'] + 1],['id' =>$id]
                    )->execute();
        }

         return $this->render('home');           
        
    }




    /**
     * This displays the page for administration.
     *
     * @return string
     */
    public function actionManagement()
    {
        return $this->render('management');
    }

     /***
     * Signup or creating user.
     */
     public function actionSignup()
    {
        if(Yii::$app->user->can('Administrator'))
            {
                $model = new SignupForm();
                if ($model->load(Yii::$app->request->post())) {
                    if ($user = $model->signup()) {
                       return $this->redirect(['user/index']);
                    }          
                }
                return $this->render('signup', [
                    'model' => $model,
                ]);
            } else {
            throw new ForbiddenHttpException(Yii::t('yii', "Sorry, you currently don't have privilege to this action."));
        }       
    }    

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //return $this->goBack();
            return $this->render('management');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
 * 
 * Language action to reload the page into
 * another set language.
 */    
    public function actionLanguage()
{
    if(isset($_POST['lang'])){
        Yii::$app->language = $_POST['lang'];
        $cookie = new yii\web\Cookie([
            'name' => 'lang',
            'value' => $_POST['lang']
                    ]);

        Yii::$app->getResponse()->getCookies()->add($cookie);
    }
}


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        $searchModel = new SourceMessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('home', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
