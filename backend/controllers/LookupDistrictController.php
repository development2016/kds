<?php

namespace backend\controllers;

use Yii;
use common\models\LookupDistrict;
use common\models\LookupDistrictSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\LookupBahagian;
/**
 * LookupDistrictController implements the CRUD actions for LookupDistrict model.
 */
class LookupDistrictController extends Controller
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
     * Lists all LookupDistrict models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LookupDistrictSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LookupDistrict model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new LookupDistrict model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LookupDistrict(); 

        if ($model->load(Yii::$app->request->post()) && $model->save() ) {

            Yii::$app->getSession()->setFlash('berjaya', 'Maklumat Daerah <b>('.$model->district.')</b> Berjaya Di Simpan');
            return $this->redirect(['index']);
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LookupDistrict model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $negeri = $_POST['LookupDistrict']['state_id'];
            if($negeri != 21){
                $model->bahagian_id = ""; //selain negeri sarawak .. bahagian_id will be null
            }
            if ($model->save()) {
                Yii::$app->getSession()->setFlash('berjaya', 'Maklumat Daerah <b>('.$model->district.')</b> Berjaya Di Kemaskini');
                return $this->redirect(['index']);
            }
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LookupDistrict model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LookupDistrict model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return LookupDistrict the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LookupDistrict::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionListbahagian($id)
    {
        $countPosts = LookupBahagian::find()
        ->where(['state_id' => $id])
        ->count();
         
        $posts = LookupBahagian::find() 
        ->where(['state_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value='Sila Pilih'>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->bahagian_id."'>".$post->bahagian."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }

   
    
    
}
