<?php

namespace app\controllers;

use app\models\Coches;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CochesController implements the CRUD actions for Coches model.
 */
class CochesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Coches models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Coches::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'bastidor' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Coches model.
     * @param string $bastidor Bastidor
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($bastidor)
    {
        return $this->render('view', [
            'model' => $this->findModel($bastidor),
        ]);
    }

    /**
     * Creates a new Coches model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Coches();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'bastidor' => $model->bastidor]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Coches model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $bastidor Bastidor
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($bastidor)
    {
        $model = $this->findModel($bastidor);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'bastidor' => $model->bastidor]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Coches model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $bastidor Bastidor
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($bastidor)
    {
        $this->findModel($bastidor)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Coches model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $bastidor Bastidor
     * @return Coches the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($bastidor)
    {
        if (($model = Coches::findOne(['bastidor' => $bastidor])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
