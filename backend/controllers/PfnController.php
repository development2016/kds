<?php

namespace backend\controllers;

use Yii;
use common\models\Pfn;
use common\models\PfnEquip;
use common\models\PfnSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupKampung;
use common\models\LookupMukim;
/**
 * PfnController implements the CRUD actions for Pfn model.
 */
class PfnController extends Controller
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
     * Lists all Pfn models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PfnSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pfn model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model_equip = PfnEquip::find()->where(['pfn_id'=>$id])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'model_equip' => $model_equip,
        ]);
    }

    /**
     * Creates a new Pfn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pfn();
        $model_equip = new PfnEquip();

        if ($model->load(Yii::$app->request->post()) && $model_equip->load(Yii::$app->request->post())) {
            $model->enter_by= Yii::$app->user->identity->id;
            $model->date_enter =date('d/m/Y');

            if ($model->save()) {

                $last_id = Yii::$app->db->getLastInsertID();

                $equip = count($_POST['PfnEquip']['equip_name']);
                for ($i=0; $i < $equip; $i++) { 
                    $model_equip =new PfnEquip();
                    $model_equip->equip_name = $_POST['PfnEquip']['equip_name'][$i];
                    $model_equip->quantity = $_POST['PfnEquip']['quantity'][$i];
                    $model_equip->condition = $_POST['PfnEquip']['condition'][$i];
                    $model_equip->pfn_id = $last_id;
                    $model_equip->save();
                    
                }

                Yii::$app->getSession()->setFlash('create', 'Maklumat Rangkaian Fasiliti Awam <b>('.$model->pfn_name.')</b> Berjaya Di Simpan');
                return $this->redirect(['index']);

            } else {
                return $this->render('create', [
                    'model' => $model,
                    'model_equip' => $model_equip,
                ]); 
            }


        } else {
            return $this->render('create', [
                'model' => $model,
                'model_equip' => $model_equip,
            ]); 
        }
    }

    /**
     * Updates an existing Pfn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->getSession()->setFlash('update', 'Maklumat Rangkaian Fasiliti Awam <b>('.$model->pfn_name.')</b> Berjaya Di kemaskini');
                return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pfn model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $model_equip = PfnEquip::find()->where(['pfn_id'=>$id])->all();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pfn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pfn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pfn::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
        public function actionListstate($id)
    {
        $countPosts = LookupState::find()
        ->where(['country_id' => $id])
        ->count();
         
        $posts = LookupState::find() 
        ->where(['country_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value='Sila Pilih'>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->state_id."'>".$post->state."</option>";
            }
        } else {
                echo "<option>-</option>";
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

    public function actionListsubbase($id)
    {
        $countPosts = LookupSubBase::find()
        ->where(['district_id' => $id])
        ->count();
         
        $posts = LookupSubBase::find() 
        ->where(['district_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value='Sila Pilih'>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->sub_base_id."'>".$post->sub_base."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }
    public function actionListcluster($id)
    {
        $countPosts = LookupCluster::find()
        ->where(['sub_base_id' => $id])
        ->count();
         
        $posts = LookupCluster::find() 
        ->where(['sub_base_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value='Sila Pilih'>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->cluster_id."'>".$post->cluster."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }

    public function actionListkampung($id)
    {
        $countPosts = LookupKampung::find()
        ->where(['cluster_id' => $id])
        ->count();
         
        $posts = LookupKampung::find() 
        ->where(['cluster_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value='Sila Pilih'>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->kampung_id."'>".$post->kampung."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }

// search

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



    public function actionListkampungsearch($id)
    {
        $countPosts = LookupKampung::find()
        ->where(['district_id' => $id])
        ->count();
         
        $posts = LookupKampung::find() 
        ->where(['district_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value=''>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->kampung_id."'>".$post->kampung."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }



    
}
