<?php

namespace backend\controllers;

use Yii;
use backend\models\Acl;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\LookupMenu;
use backend\models\AclMenu;

use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupKampung;
/**
 * AclController implements the CRUD actions for Acl model.
 */
class AclController extends Controller
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
     * Lists all Acl models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Acl model.
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
     * Creates a new Acl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Acl();
        $model_acl = new AclMenu();
        $model_menu = LookupMenu::find()->all();
        $model_user = User::find()->where(['id'=>$id])->one();

        if ($model->load(Yii::$app->request->post()) && $model_acl->load(Yii::$app->request->post()) ) {

            $model->user_id = $id;
            $model->role_id = $_POST['Acl']['role_id'];

            if ($model->save()) {

                $last_id = Yii::$app->db->getLastInsertID();


                $menu = count($_POST['AclMenu']['menu_id']);
                for ($i=0; $i < $menu; $i++) { 

                        $model_acl=new AclMenu;
                        $model_acl->menu_id = $_POST['AclMenu']['menu_id'][$i];
                        $model_acl->acl_id = $last_id;
                        $model_acl->save();
                
                }
                $model_user->status = 10;
                $model_user->role = $_POST['Acl']['role_id'];
                $model_user->save();
                Yii::$app->getSession()->setFlash('acl', 'ACL bagi <b>('.$model_user->nama.')</b> Berjaya Di Jana');
                return $this->redirect(['index']);
                
            }
           
        } else {
            return $this->render('create', [
                'model' => $model,
                'model_menu' => $model_menu,
                'model_acl' => $model_acl,
                'model_user' => $model_user,
            ]);
        }
    }

    /**
     * Updates an existing Acl model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
   
        $model = Acl::find()->where(['user_id'=>$id])->one();

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT acl_menu.menu_id FROM acl RIGHT JOIN acl_menu ON acl.id = acl_menu.acl_id WHERE acl.user_id = '".$id."' ");
        $model_acl = $sql->queryAll();

        //$model_acl = new AclMenu();
        $model_menu = LookupMenu::find()->all();
        $model_user = User::find()->where(['id'=>$id])->one();

        if ($model->load(Yii::$app->request->post())) {

            if ($model->save()) {

                $model_user->role = $_POST['Acl']['role_id'];
                $model_user->save();
                Yii::$app->getSession()->setFlash('aclUpdate', 'ACL bagi <b>('.$model_user->nama.')</b> Berjaya Di Kemaskini');
                return $this->redirect(['index']);
            }
            
        } else {
            return $this->render('update', [
                'model' => $model,
                'model_menu' => $model_menu,
                'model_acl' => $model_acl,
                'model_user' => $model_user,
            ]);
        }
    }

    /**
     * Deletes an existing Acl model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Acl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Acl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Acl::findOne($id)) !== null) {
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
}
