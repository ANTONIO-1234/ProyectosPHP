<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
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
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionMensaje(){
        return $this->render('vista'); // RENDERIZAMOS LA VISTA
    }

    public function actionMeses1(){
        $datos=["Enero","Febrero","Marzo","Abril","Mayo","Junio"];
        return $this->render("meses1", ["argumento" => $datos]);
    }
}
