<?php

namespace app\controllers;

use app\models\Alquiler;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlquilerController implements the CRUD actions for Alquiler model.
 */
class AlquilerController extends Controller
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
     * Lists all Alquiler models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Alquiler::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idAlquiler' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alquiler model.
     * @param int $idAlquiler Id Alquiler
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idAlquiler)
    {
        return $this->render('view', [
            'model' => $this->findModel($idAlquiler),
        ]);
    }

    /**
     * Creates a new Alquiler model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Alquiler();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idAlquiler' => $model->idAlquiler]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Alquiler model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idAlquiler Id Alquiler
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idAlquiler)
    {
        $model = $this->findModel($idAlquiler);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idAlquiler' => $model->idAlquiler]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Alquiler model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idAlquiler Id Alquiler
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idAlquiler)
    {
        $this->findModel($idAlquiler)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Alquiler model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idAlquiler Id Alquiler
     * @return Alquiler the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idAlquiler)
    {
        if (($model = Alquiler::findOne(['idAlquiler' => $idAlquiler])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
