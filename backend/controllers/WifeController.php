<?php

namespace backend\controllers;

use Yii;
use common\models\Wife;
use common\models\WifeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WifeController implements the CRUD actions for Wife model.
 */
class WifeController extends Controller
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
     * Lists all Wife models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WifeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Wife model.
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
     * Creates a new Wife model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Wife();

        if ($model->load(Yii::$app->request->post())) {
            $model->people_id = $id;
            $model->save();
            Yii::$app->getSession()->setFlash('createWife', 'Maklumat Pasangan <b>('.$model->wife_name.')</b> Berjaya Di Simpan');
            return $this->redirect(['/people/update', 'id' => $model->people_id,'#'=>'tab_2']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Wife model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('updateWife', 'Maklumat Pasangan <b>('.$model->wife_name.')</b> Berjaya Di Kemaskini');
            return $this->redirect(['/people/update', 'id' => $model->people_id,'#'=>'tab_2']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Wife model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->findModel($id)->delete();
        Yii::$app->getSession()->setFlash('buangWife', 'Maklumat Pasangan <b>('.$model->wife_name.')</b> Berjaya Di Buang');
        return $this->redirect(['/people/update', 'id' => $model->people_id,'#'=>'tab_2']);
        //return $this->redirect(['index']);
    }

    /**
     * Finds the Wife model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Wife the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Wife::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
