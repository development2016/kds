<?php

namespace backend\controllers;

use Yii;
use backend\models\AclRoleMenu;
use backend\models\AclDataFilter;
use common\models\LookupState;
use backend\models\AclRoleMenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\LookupMenu;

/**
 * AclRoleMenuController implements the CRUD actions for AclRoleMenu model.
 */
class AclRoleMenuController extends Controller
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
     * Lists all AclRoleMenu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AclRoleMenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AclRoleMenu model.
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
     * Creates a new AclRoleMenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AclRoleMenu();
        $model_menu = LookupMenu::find()->all();


        if ($model->load(Yii::$app->request->post())) {

            $menu = count($_POST['AclRoleMenu']['menu_id']);
            for ($i=0; $i < $menu; $i++) { 
                $model =new AclRoleMenu;
                $model->user_id = $_POST['AclRoleMenu']['user_id'];
                $model->role_id = $_POST['AclRoleMenu']['role_id'];
                $model->menu_id = $_POST['AclRoleMenu']['menu_id'][$i];
                $model->save();

            } 
             return $this->redirect(['filter', 'user_id' => $model->user_id]);

        } else {
            return $this->render('create', [
                'model' => $model,
                'model_menu' => $model_menu,
            ]);
        }
    }





    public function actionFilter($user_id)
    {
        $model = new AclDataFilter();
        $model_state = LookupState::find()->all();
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT * FROM  acl_role_menu RIGHT JOIN lookup_menu ON acl_role_menu.menu_id = lookup_menu.menu_id WHERE acl_role_menu.user_id = '".$user_id."'");
        $model_acl = $sql->queryAll();


        if ($model->load(Yii::$app->request->post())) {
            
$filter = count($_POST['AclDataFilter']['role_menu_id']);
for ($i=1; $i <= $filter; $i++) { 
   $model = new AclDataFilter();
   
   $model->role_menu_id = $_POST['AclDataFilter']['role_menu_id'][$i];
   
   $data_state = array();
   $data_state = $_POST['AclDataFilter']['data_state'][$i];
   $data_state2 = array();
   foreach($data_state as $key => $value){
       $data_state2[] = $value;
   }
   $model->data_state = serialize($data_state2);
   $model->save();
}



            

        } else {

            return $this->render('filter',[
                'model_acl'=>$model_acl,
                'model_state' => $model_state,
                'model' => $model,
            ]);

        }

    } 

    /**
     * Updates an existing AclRoleMenu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->role_menu_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AclRoleMenu model.
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
     * Finds the AclRoleMenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AclRoleMenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AclRoleMenu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
