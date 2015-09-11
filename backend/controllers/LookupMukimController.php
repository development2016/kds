<?php

namespace backend\controllers;

use Yii;
use common\models\LookupMukim;
use common\models\LookupMukimSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\LookupDistrict;
use backend\models\CountMukim;
/**
 * LookupMukimController implements the CRUD actions for LookupMukim model.
 */
class LookupMukimController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                /*'actions' => [
                    'delete' => ['post'],
                ],*/
            ],
        ];
    }

    /**
     * Lists all LookupMukim models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LookupMukimSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LookupMukim model.
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
     * Creates a new LookupMukim model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LookupMukim();
        $model_count = new CountMukim();

        if ($model->load(Yii::$app->request->post()) ) {

            if ($model->save()) {
                $last_id = Yii::$app->db->getLastInsertID();
                
                $model_count->state_id =  $_POST['LookupMukim']['state_id'];
                $model_count->district_id =  $_POST['LookupMukim']['district_id'];
                $model_count->mukim_id = $last_id;
                $model_count->save();
            }
            Yii::$app->getSession()->setFlash('berjaya', 'Maklumat Mukim <b>('.$model->mukim.')</b> Berjaya Di Simpan');
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LookupMukim model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model_count = CountMukim::find()->where(['mukim_id'=>$id])->one();

        if ($model->load(Yii::$app->request->post()) ) {

            if ($model->save()) {

                $model_count->state_id =  $_POST['LookupMukim']['state_id'];
                $model_count->district_id =  $_POST['LookupMukim']['district_id'];
                $model_count->save();
            }
            Yii::$app->getSession()->setFlash('berjaya', 'Maklumat Mukim <b>('.$model->mukim.')</b> Berjaya Di Kemaskini');
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LookupMukim model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        CountMukim::deleteAll(['mukim_id'=>$id]);

        return $this->redirect(['index']);
    }

    /**
     * Finds the LookupMukim model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LookupMukim the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LookupMukim::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



    public function actionListdistrict($id)
    {
        $countPosts = LookupDistrict::find()
        ->where(['state_id' => $id])
        ->count();
         
        $posts = LookupDistrict::find() 
        ->where(['state_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value='Sila Pilih'>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->district_id."'>".$post->district."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }

    public function actionListdistrictsearch($id)
    {
        $countPosts = LookupDistrict::find()
        ->where(['state_id' => $id])
        ->count();
         
        $posts = LookupDistrict::find() 
        ->where(['state_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value=''>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->district_id."'>".$post->district."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }



}
