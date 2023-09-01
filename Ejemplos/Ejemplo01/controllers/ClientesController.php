<?php

namespace app\controllers;

use app\models\Clientes;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClientesController implements the CRUD actions for Clientes model.
 */
class ClientesController extends Controller
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
     * Lists all Clientes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Clientes::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'nif' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Clientes model.
     * @param string $nif Nif
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($nif)
    {
        return $this->render('view', [
            'model' => $this->findModel($nif),
        ]);
    }

    /**
     * Creates a new Clientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Clientes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'nif' => $model->nif]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Clientes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $nif Nif
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($nif)
    {
        $model = $this->findModel($nif);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nif' => $model->nif]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Clientes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $nif Nif
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($nif)
    {
        $this->findModel($nif)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Clientes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nif Nif
     * @return Clientes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nif)
    {
        if (($model = Clientes::findOne(['nif' => $nif])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
