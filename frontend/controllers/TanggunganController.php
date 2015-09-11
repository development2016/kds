<?php

namespace frontend\controllers;

use Yii;
use common\models\Tanggungan;
use common\models\TanggunganSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TanggunganController implements the CRUD actions for Tanggungan model.
 */
class TanggunganController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tanggungan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TanggunganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tanggungan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tanggungan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Tanggungan();

        if ($model->load(Yii::$app->request->post())) {
            $model->people_id = $id;
            $model->save();
            Yii::$app->getSession()->setFlash('createTanggungan', 'Maklumat Tanggungan <b>('.$model->nama_tanggungan.')</b> Berjaya Di Simpan');
            return $this->redirect(['/people/update', 'id' => $model->people_id,'#'=>'tab_3']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tanggungan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('updateTanggungan', 'Maklumat Tanggungan <b>('.$model->nama_tanggungan.')</b> Berjaya Di Kemaskini');
            return $this->redirect(['/people/update', 'id' => $model->people_id,'#'=>'tab_3']);

        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tanggungan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->findModel($id)->delete();
        Yii::$app->getSession()->setFlash('buangTanggungan', 'Maklumat Tanggungan <b>('.$model->nama_tanggungan.')</b> Berjaya Di Buang');
        return $this->redirect(['/people/update', 'id' => $model->people_id,'#'=>'tab_3']);
    }

    /**
     * Finds the Tanggungan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tanggungan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tanggungan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
