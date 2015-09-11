<?php

namespace frontend\controllers;

use Yii;
use common\models\TanggunganOku;
use common\models\TanggunganOkuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TanggunganOkuController implements the CRUD actions for TanggunganOku model.
 */
class TanggunganOkuController extends Controller
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
     * Lists all TanggunganOku models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TanggunganOkuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TanggunganOku model.
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
     * Creates a new TanggunganOku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new TanggunganOku();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->people_id = $id;
            $model->save();
            Yii::$app->getSession()->setFlash('createTanggunganOku', 'Maklumat Tanggungan Oku <b>('.$model->nama.')</b> Berjaya Di Simpan');
            return $this->redirect(['/people/update', 'id' => $model->people_id,'#'=>'tab_5']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TanggunganOku model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('updateTanggunganOku', 'Maklumat Tanggungan Oku <b>('.$model->nama.')</b> Berjaya Di Kemaskini');
            return $this->redirect(['/people/update', 'id' => $model->people_id,'#'=>'tab_5']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TanggunganOku model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->findModel($id)->delete();
        Yii::$app->getSession()->setFlash('buangTanggunganOku', 'Maklumat Tanggungan Oku <b>('.$model->nama.')</b> Berjaya Di Buang');
        return $this->redirect(['/people/update', 'id' => $model->people_id,'#'=>'tab_5']);
    }

    /**
     * Finds the TanggunganOku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TanggunganOku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TanggunganOku::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
