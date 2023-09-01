<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
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
//        $consulta= \Yii::$app->db->createCommand('');
        
        $dataProvider=new \yii\data\SqlDataProvider([ // MOSTRAR ACTIVIDADES REALIZADAS HOY
            'sql' => 'SELECT DISTINCT a.*
                      FROM realizan r JOIN actividades a ON r.actividad = a.id 
                      WHERE DATE_FORMAT(r.fechahora, "%Y-%m-%d")=CURDATE()'
        ]);
        
        $dataProvider1=new \yii\data\SqlDataProvider([ // MOSTRAR ACTIVIDADES MÁS REALIZADAS
            'sql' => 'SELECT r.actividad, a.nombre, a.imagen, a.descripcion, a.duracion, 
                      COUNT(*) veces FROM realizan r JOIN actividades a ON 
                      r.actividad = a.id GROUP BY a.id ORDER BY veces DESC'
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'dataProvider1' => $dataProvider1
        ]);
        
    }
    
    public function actionHoy(){
        $dataProvider=new \yii\data\SqlDataProvider([ // MOSTRAR ACTIVIDADES DISPONIBLES HOY
            'sql' => 'SELECT a.*, r.sala, r.monitor, r.fechahora 
                      FROM realizan r JOIN actividades a ON r.actividad = a.id 
                      WHERE DATE_FORMAT(r.fechahora, "%Y-%m-%d")=CURDATE()
                      AND r.fechahora>NOW()'
        ]);
        
        $consulta= \app\models\Realizan::find()-> // CONSULTA SIMILAR CON ACTIVEDATAPROVIDER
                where('DATE_FORMAT(fechahora, "%Y-%m-%d")=CURDATE()
                      AND fechahora>NOW()');
        
        $dataProvider1=new \yii\data\ActiveDataProvider([
            "query" => $consulta
        ]);
               
        return $this->render('hoy', [
            'dataProvider' => $dataProvider,
            'dataProvider1' => $dataProvider1
        ]);
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
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
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
    
    public function actionInformacion($id)
    {   $consulta= \app\models\Realizan::find()
                 ->where("actividad=$id AND DATE_FORMAT(fechahora, '%Y-%m-%d')=CURDATE()");
        $dataProvider=new \yii\data\ActiveDataProvider([
            "query" => $consulta
        ]);
        
        return $this->render('informacion',[
           "dataProvider" => $dataProvider
        ]);
    }
}
