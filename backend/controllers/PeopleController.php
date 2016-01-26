<?php

namespace backend\controllers;

use Yii;
use backend\models\People;
use common\models\PeopleOku;
use common\models\Wife;
use common\models\Tanggungan;
use backend\models\PeopleSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupKampung;
use common\models\Question;
use common\models\Answer;
use common\models\TanggunganOku;
use common\models\LookupMukim;
use yii\helpers\Json;
/**
 * PeopleController implements the CRUD actions for People model.
 */
class PeopleController extends Controller
{
    public function behaviors()
    {
        return [
            /*'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],*/
        ];
    }

    /**
     * Lists all People models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PeopleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionGenerate($id){

        for ($i=1; $i <=52 ; $i++) { 
            
            $model_answer = new Answer();
            $d = $model_answer->question_id = $i;
            $model_answer->answer = "Tidak";
            $o = $model_answer->people_id = $id;
            $r = $model_answer->save();

        }
        Yii::$app->getSession()->setFlash('generateSoalan', 'Maklumat Soalan Berjaya Di Jana');
        return $this->redirect(['/people/update', 'id' => $model_answer->people_id,'#'=>'tab_4']);

         
        
    }
    /**
     * Displays a single People model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $model_oku = PeopleOku::find()->where(['people_id'=>$id])->one();

        $model_wife = Wife::find()->where(['people_id'=>$id])->all();

        $model_tanggungan = Tanggungan::find()->where(['people_id'=>$id])->all();

        $model_answer = new ActiveDataProvider([
            'query' => Answer::find()->where(['people_id'=>$id]),
            'pagination' => ['pageSize'=>52],
        ]);
        $model_tanggunganoku = TanggunganOku::find()->where(['people_id'=>$id])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'model_oku' => $model_oku,
            'model_wife' => $model_wife,
            'model_tanggungan' => $model_tanggungan,
            'model_answer' => $model_answer,
            'model_tanggunganoku' => $model_tanggunganoku,
        ]);
    }

    /**
     * Creates a new People model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new People();
        $model_oku = new PeopleOku();
        $model_wife = new Wife();
        $model_tanggungan = new Tanggungan();
        $model_question = Question::find()->all();
        $model_answer = new Answer();
        $model_tanggunganoku = new TanggunganOku();


        if ($model->load(Yii::$app->request->post()) && $model_oku->load(Yii::$app->request->post()) && $model_wife->load(Yii::$app->request->post()) && $model_tanggungan->load(Yii::$app->request->post()) && $model_answer->load(Yii::$app->request->post()) && $model_tanggunganoku->load(Yii::$app->request->post())) {

            $model->name=strtoupper($_POST['People']['name']);
            $model->data_status="Separa Sah";
            $model->enter_by= Yii::$app->user->identity->id;
            $model->enter_date=date('Y/m/d');

            if ($model->save()) {

                $last_id = Yii::$app->db->getLastInsertID();

                $wife = count($_POST['Wife']['wife_name']);
                for ($i=0; $i < $wife; $i++) { 
                    $model_wife =new Wife();
                    $model_wife->wife_name = strtoupper($_POST['Wife']['wife_name'][$i]);
                    $model_wife->wife_ic = $_POST['Wife']['wife_ic'][$i];
                    $model_wife->wife_work = $_POST['Wife']['wife_work'][$i];
                    $model_wife->wife_oku = $_POST['Wife']['wife_oku'][$i];
                    $model_wife->people_id = $last_id;
                    $model_wife->save();
                    
                }

                $tanggungan = count($_POST['Tanggungan']['nama_tanggungan']);
                for ($i=0; $i < $tanggungan; $i++) { 
                    $model_tanggungan =new Tanggungan();
                    $model_tanggungan->nama_tanggungan = strtoupper($_POST['Tanggungan']['nama_tanggungan'][$i]);
                    $model_tanggungan->no_ic_tanggungan = $_POST['Tanggungan']['no_ic_tanggungan'][$i];
                    $model_tanggungan->tarikh_lahir = $_POST['Tanggungan']['tarikh_lahir'][$i];
                    $model_tanggungan->edu_level = $_POST['Tanggungan']['edu_level'][$i];
                    $model_tanggungan->tanggungan_kerja = $_POST['Tanggungan']['tanggungan_kerja'][$i];
                    $model_tanggungan->hubungan = $_POST['Tanggungan']['hubungan'][$i];
                    $model_tanggungan->tanggungan_oku = $_POST['Tanggungan']['tanggungan_oku'][$i];
                    $model_tanggungan->note = $_POST['Tanggungan']['note'][$i];
                    $model_tanggungan->people_id = $last_id;
                    $model_tanggungan->save();

                    
                }     

                $answr = count($_POST['Answer']['answer']);
                for ($i=1; $i <= $answr; $i++) { 
                    $model_answer =new Answer;
                    $model_answer->answer = $_POST['Answer']['answer'][$i];
                    $model_answer->question_id = $i;//$_POST['Answer']['question_id'][$i];
                    $model_answer->people_id = $last_id;
                    $model_answer->save();
                }        

                if ($model->tanggungan_oku == "Tidak") {

                } else {
                    
                    $tanggunganOku = count($_POST['TanggunganOku']['nama']);
                    for ($i=0; $i < $tanggunganOku; $i++) { 
                        $model_tanggunganoku =new TanggunganOku;
                        $model_tanggunganoku->nama = strtoupper($_POST['TanggunganOku']['nama'][$i]);
                        $model_tanggunganoku->umur = $_POST['TanggunganOku']['umur'][$i];
                        $model_tanggunganoku->hubungan = $_POST['TanggunganOku']['hubungan'][$i];
                        $model_tanggunganoku->no_pendaftaran = $_POST['TanggunganOku']['no_pendaftaran'][$i];
                        $model_tanggunganoku->kategori = $_POST['TanggunganOku']['kategori'][$i];
                        $model_tanggunganoku->nota = $_POST['TanggunganOku']['nota'][$i];
                        $model_tanggunganoku->tahap_pendidikan = $_POST['TanggunganOku']['tahap_pendidikan'][$i];
                        $model_tanggunganoku->nama_sekolah = $_POST['TanggunganOku']['nama_sekolah'][$i];
                        $model_tanggunganoku->people_id = $last_id;
                        $model_tanggunganoku->save();
                        
                    }

                }

                    if ($model->oku == "Tidak") {
                        Yii::$app->getSession()->setFlash('create', 'Maklumat Profil <b>('.$model->name.')</b> Berjaya Di Simpan');
                        return $this->redirect(['index']);
                    }
                    else {
                        $model_oku->people_id = $last_id;
                        $model_oku->save();
                        Yii::$app->getSession()->setFlash('create', 'Maklumat Profil <b>('.$model->name.')</b> Berjaya Di Simpan');
                        return $this->redirect(['index']);
                    }
            }
            else {

                return $this->render('create', [
                    'model' => $model,
                    'model_oku' => $model_oku,
                    'model_wife' => $model_wife,
                    'model_tanggungan' => $model_tanggungan,
                    'model_question' => $model_question,
                    'model_answer' => $model_answer,
                    'model_tanggunganoku' => $model_tanggunganoku,
                ]);
            }        
            
        } else {
            return $this->render('create', [
                'model' => $model,
                'model_oku' => $model_oku,
                'model_wife' => $model_wife,
                'model_tanggungan' => $model_tanggungan,
                'model_question' => $model_question,
                'model_answer' => $model_answer,
                'model_tanggunganoku' => $model_tanggunganoku,
            ]);
        }
    }

    /**
     * Updates an existing People model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_oku = PeopleOku::find()->where(['people_id'=>$id])->one();

        $model_wife = Wife::find()->where(['people_id'=>$id])->all();

        $model_tanggungan = Tanggungan::find()->where(['people_id'=>$id])->all();

        $model_answer = new ActiveDataProvider([
            'query' => Answer::find()->where(['people_id'=>$id]),
            'pagination' => ['pageSize'=>52],
        ]);
        $model_tanggunganoku = TanggunganOku::find()->where(['people_id'=>$id])->all();

        if ($model->load(Yii::$app->request->post())  && $model_oku->load(Yii::$app->request->post()) ) {

            if (isset($_POST['sah'])) {
                

                    $model->verified_by=Yii::$app->user->identity->id;
                    $model->data_status="Sah";
                    $model->verified_date=date('Y-m-d');

                    if ($model->save() && $model_oku->save()) {
                        Yii::$app->getSession()->setFlash('sahPeople', 'Maklumat Responden <b>('.$model->name.')</b> Berjaya Di Sahkan');
                        return $this->redirect(['/people/update', 'id' => $model->people_id,'#'=>'tab_1']);
                    }
            } else {
                if ($model->save() && $model_oku->save()) {
                    Yii::$app->getSession()->setFlash('updatePeople', 'Maklumat Responden <b>('.$model->name.')</b> Berjaya Di Kemaskini');
                    return $this->redirect(['/people/update', 'id' => $model->people_id,'#'=>'tab_1']);
                }
            }
 
            
           
        } else {
            return $this->render('update', [
                'model' => $model,
                'model_oku' => $model_oku,
                'model_wife' => $model_wife,
                'model_tanggungan' => $model_tanggungan,
                'model_answer' => $model_answer,
                'model_tanggunganoku' => $model_tanggunganoku,
            ]);
        }
    }

    /**
     * Deletes an existing People model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $this->findModel($id)->delete();
        PeopleOku::deleteAll(['people_id'=>$id]);
        Wife::deleteAll(['people_id'=>$id]);
        Tanggungan::deleteAll(['people_id'=>$id]);
        TanggunganOku::deleteAll(['people_id'=>$id]);
        Answer::deleteAll(['people_id'=>$id]);

        Yii::$app->getSession()->setFlash('deletePeople', 'Maklumat Berjaya Di Buang!');
        return $this->redirect(['index']);
    }

    /**
     * Finds the People model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return People the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = People::findOne($id)) !== null) {
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
    
    public function actionJson($id)
    {
 
        $connection = \Yii::$app->db;
        $model = $connection->createCommand('SELECT * FROM people RIGHT JOIN lookup_state ON people.state_id = lookup_state.state_id
        RIGHT JOIN lookup_district ON people.district_id = lookup_district.district_id
        RIGHT JOIN lookup_kampung ON people.kampung_id = lookup_kampung.kampung_id where people.ic_no ="'.$id.'"'); //edit kampung_id
        $users = $model->queryAll();
        //$this->setHeader(200);
         
        echo json_encode($users);

    }
}
