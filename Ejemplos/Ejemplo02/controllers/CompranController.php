<?php

namespace app\controllers;

use app\models\Compran;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompranController implements the CRUD actions for Compran model.
 */
class CompranController extends Controller
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
     * Lists all Compran models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Compran::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idCompran' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Compran model.
     * @param int $idCompran Id Compran
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idCompran)
    {
        return $this->render('view', [
            'model' => $this->findModel($idCompran),
        ]);
    }

    /**
     * Creates a new Compran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Compran();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idCompran' => $model->idCompran]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Compran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idCompran Id Compran
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idCompran)
    {
        $model = $this->findModel($idCompran);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCompran' => $model->idCompran]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Compran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idCompran Id Compran
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idCompran)
    {
        $this->findModel($idCompran)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Compran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idCompran Id Compran
     * @return Compran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCompran)
    {
        if (($model = Compran::findOne(['idCompran' => $idCompran])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
