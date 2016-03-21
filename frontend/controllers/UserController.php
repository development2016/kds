<?php

namespace frontend\controllers;

use Yii;
use frontend\models\User;
use frontend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use common\models\MembersInfo;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupKampung;
use common\models\UserAkademik;
use common\models\UserPengalaman;
use common\models\UserBahasa;
use common\models\UserKemahiran;
use common\models\UserMinat;
use frontend\models\UserPassword;
use yii\filters\AccessControl;
use common\models\LookupMukim;
use common\models\LookupBahagian;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{



    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['mohon','signup','reset','change','lost','password','liststate','listdistrict','listkampung','listkampungarea','listclusterarea','listsubbasearea','listdistrictarea','liststatearea','listdistrictketuakampung','listmukimketuakampung','listkampungketuakampung','listdistrictpejabat_daerah','listdistrictpenghulu','listmukimpenghulu','listbahagian','listdistrictbahagian','listmukim','listjohorsubbase'],
                        'allow' => true,
                        //'roles' => ['?'],
                    ],
                    [
                        'actions' => ['view','index','update'],
                        'allow' => true, // can be false
                        'roles' => ['@'],

                    ],
                ],
            ],

           /* 'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],*/
        ];
    }

    /**
     * Lists all User models.
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
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   

        $model_userminat = UserMinat::find()->where(['user_id' => $id])->one();

        $model_userakademik = UserAkademik::find()->where(['user_id' => $id])->all();

        $model_userpengalaman = UserPengalaman::find()->where(['user_id' => $id])->all();

        $model_bahasa = UserBahasa::find()->where(['user_id'=>$id])->one();

        $model_kemahiran = UserKemahiran::find()->where(['user_id'=>$id])->one();
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('kemaskini', 'Maklumat Anda Berjaya DiKemaskini');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('view', [

                'model' => $model,
                'model_userakademik' => $model_userakademik,
                'model_userpengalaman' => $model_userpengalaman,
                'model_userminat' => $model_userminat,
                'model_bahasa' => $model_bahasa,
                'model_kemahiran' => $model_kemahiran,
            ]);
        }

    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new User();
        $model_akademik = new UserAkademik();
        $model_pengalaman = new UserPengalaman();
        $model_bahasa = new UserBahasa();
        $model_kemahiran = new UserKemahiran();
        $model_minat = new UserMinat();
        $model_passwrd = new UserPassword();

        if ($model->load(Yii::$app->request->post()) && $model_akademik->load(Yii::$app->request->post()) && $model_pengalaman->load(Yii::$app->request->post()) && $model_bahasa->load(Yii::$app->request->post()) && $model_kemahiran->load(Yii::$app->request->post()) && $model_minat->load(Yii::$app->request->post())) {

            $model->status = 0;
            $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['User']['password_hash']);
            $model->auth_key = Yii::$app->security->generateRandomString();
            $model->created_at = date('d/m/Y');


            if ($model->save()) {

                $last_id = Yii::$app->db->getLastInsertID();

                $akademik = count($_POST['UserAkademik']['tahap_pendidikan']);
                for ($i=0; $i < $akademik; $i++) { 
                    $model_akademik =new UserAkademik();
                    $model_akademik->tahap_pendidikan = strtoupper($_POST['UserAkademik']['tahap_pendidikan'][$i]);
                    $model_akademik->sijil = $_POST['UserAkademik']['sijil'][$i];
                    $model_akademik->nama_institusi = $_POST['UserAkademik']['nama_institusi'][$i];
                    $model_akademik->bidang_pengkhususan = $_POST['UserAkademik']['bidang_pengkhususan'][$i];
                    $model_akademik->gred_keseluruhan = $_POST['UserAkademik']['gred_keseluruhan'][$i];
                    $model_akademik->tarikh_anugerah = $_POST['UserAkademik']['tarikh_anugerah'][$i];
                    $model_akademik->user_id = $last_id;
                    $model_akademik->save();
                    
                }

                $pengalaman = count($_POST['UserPengalaman']['nama_organisasi']);
                for ($i=0; $i < $pengalaman; $i++) { 
                    $model_pengalaman =new UserPengalaman();
                    $model_pengalaman->nama_organisasi = strtoupper($_POST['UserPengalaman']['nama_organisasi'][$i]);
                    $model_pengalaman->jawatan = $_POST['UserPengalaman']['jawatan'][$i];
                    $model_pengalaman->bidang = $_POST['UserPengalaman']['bidang'][$i];
                    $model_pengalaman->tarikh_mula = $_POST['UserPengalaman']['tarikh_mula'][$i];
                    $model_pengalaman->tarikh_tamat = $_POST['UserPengalaman']['tarikh_tamat'][$i];
                    $model_pengalaman->user_id = $last_id;
                    $model_pengalaman->save();
                    
                }

                $model_bahasa->attributes=$_POST['UserBahasa'];
                $model_bahasa->user_id = $last_id;
                $model_bahasa->save();
                
                $model_kemahiran->attributes=$_POST['UserKemahiran'];
                $ict = serialize($_POST['UserKemahiran']['perkakasan_ict']);
                $model_kemahiran->perkakasan_ict = $ict;
                $model_kemahiran->user_id = $last_id;
                $model_kemahiran->save();


                $model_minat->attributes=$_POST['UserMinat'];
                $model_minat->user_id = $last_id;
                $model_minat->save();

                $model_passwrd->password = $_POST['User']['password_hash'];
                $model_passwrd->user_id = $last_id;
                $model_passwrd->save();

                Yii::$app->getSession()->setFlash('signup', 'Pendaftaran Anda Berjaya');
                return $this->redirect(['site/index']);
            } else {

                return $this->render('signup', [
                    'model' => $model,
                    'model_akademik' => $model_akademik,
                    'model_pengalaman' => $model_pengalaman,
                    'model_bahasa' => $model_bahasa,
                    'model_kemahiran' => $model_kemahiran,
                    'model_minat' => $model_minat,
                ]);

            }

        } else {
            return $this->render('signup', [
                'model' => $model,
                'model_akademik' => $model_akademik,
                'model_pengalaman' => $model_pengalaman,
                'model_bahasa' => $model_bahasa,
                'model_kemahiran' => $model_kemahiran,
                'model_minat' => $model_minat,
            ]);
        }
    }

    public function actionMohon()
    {
        $model = new User();
        $member = new MembersInfo();
        $model_passwrd = new UserPassword();

        if ($model->load(Yii::$app->request->post()) && $member->load(Yii::$app->request->post())) {

            $model->status = 0;
            $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['User']['password_hash']);
            $model->auth_key = Yii::$app->security->generateRandomString();
            $model->created_at = date('d/m/Y');

            if ($model->save()) {

                $last_id = Yii::$app->db->getLastInsertID();

                $model_passwrd->password = $_POST['User']['password_hash'];
                $model_passwrd->user_id = $last_id;
                $model_passwrd->save();

                $member->user_id = $last_id;
                $member->save();

                Yii::$app->getSession()->setFlash('member', 'Permohonan Anda Berjaya');
                return $this->redirect(['site/index']);

            } else {

                return $this->render('mohon', [
                    'model' => $model,
                    'member' => $member,
                ]);

            }



        } else {

            return $this->render('mohon', [
                'model' => $model,
                'member' => $member,
            ]);

        }



    }


    public function actionReset()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {

            $ic_no = $model->ic_no = $_POST['User']['ic_no'];

            $model_user = User::find()->where(['ic_no'=>$ic_no])->one();
            if (empty($model_user->ic_no)) {
               return $this->redirect(['lost','ic_no'=>$ic_no]);
            } else {
                return $this->redirect(['change','id'=>base64_encode($model_user->id)]);
            }

            

        } else {

            return $this->render('reset', [
                'model' => $model,
            ]);

        }
    }

    public function actionLost($ic_no)
    {

        return $this->render('lost',['ic_no'=>$ic_no]);

    }

    public function actionChange($id)
    {
        $id = base64_decode(Yii::$app->getRequest()->getQueryParam('id'));
        $model_passwrd = new UserPassword();
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['User']['password_hash']);
            $model->auth_key = Yii::$app->security->generateRandomString();
            $model->status = 0;
            $model_passwrd->password = $_POST['User']['password_hash'];
            $model_passwrd->user_id = $id;
            $model->save() && $model_passwrd->save();
            Yii::$app->getSession()->setFlash('passUpdate', '<b>'.$model->nama.'</b>, Kata Laluan Anda Berjaya DiSimpan');
            return $this->redirect(['site/index']);
        } else {
            return $this->render('change', [
                'model' => $model,
            ]);
        }

    }

    public function actionPassword($id)
    {
        $id = base64_decode(Yii::$app->getRequest()->getQueryParam('id'));
        $model_passwrd = new UserPassword();
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['User']['password_hash']);
            $model->auth_key = Yii::$app->security->generateRandomString();
            $model->status = 0;
            $model_passwrd->password = $_POST['User']['password_hash'];
            $model_passwrd->user_id = $id;
            $model->save() && $model_passwrd->save();
            Yii::$app->getSession()->setFlash('passEdit', '<b>'.$model->nama.'</b>, Kata Laluan Anda Berjaya DiKemaskini');
            return $this->redirect(['site/index']);
        } else {
            return $this->render('password', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $id = base64_decode(Yii::$app->getRequest()->getQueryParam('id'));
        $model = $this->findModel($id);
        $model_passwrd = new UserPassword();
        if ($model->load(Yii::$app->request->post())) {
            $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['User']['password_hash']);
            $model->auth_key = Yii::$app->security->generateRandomString();
            $model->status = 10;
            $model_passwrd->password = $_POST['User']['password_hash'];
            $model_passwrd->user_id = $id;
            $model->save() && $model_passwrd->save();
            return $this->redirect(['user/index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $id = base64_decode(Yii::$app->getRequest()->getQueryParam('id'));
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
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

    public function actionListkampung($id)
    {
        $countPosts = LookupKampung::find()
        ->where(['district_id' => $id])
        ->count();
         
        $posts = LookupKampung::find() 
        ->where(['district_id' => $id])
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


    public function actionListstatearea($id)
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

    public function actionListdistrictarea($id)
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

    public function actionListsubbasearea($id)
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
    public function actionListclusterarea($id)
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

    public function actionListkampungarea($id)
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






/* dropdown for ketua kampung */


    public function actionListdistrictketuakampung($id)
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

    public function actionListmukimketuakampung($id)
    {
        $countPosts = LookupMukim::find()
        ->where(['district_id' => $id])
        ->count();
         
        $posts = LookupMukim::find() 
        ->where(['district_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value='Sila Pilih'>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->mukim_id."'>".$post->mukim."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }



    public function actionListkampungketuakampung($id)
    {
        $countPosts = LookupKampung::find()
        ->where(['mukim_id' => $id])
        ->count();
         
        $posts = LookupKampung::find() 
        ->where(['mukim_id' => $id])
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


    /* dropdown for ketua daerah */

    public function actionListdistrictpejabat_daerah($id)
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



    /* dropdown for penghulu */


    public function actionListdistrictpenghulu($id)
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

    public function actionListmukimpenghulu($id)
    {
        $countPosts = LookupMukim::find()
        ->where(['district_id' => $id])
        ->count();
         
        $posts = LookupMukim::find() 
        ->where(['district_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value='Sila Pilih'>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->mukim_id."'>".$post->mukim."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }
/* create by shahril */
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
    public function actionListdistrictbahagian($id)
    {
        $countPosts = LookupDistrict::find()
        ->where(['bahagian_id' => $id])
        ->count();
         
        $posts = LookupDistrict::find() 
        ->where(['bahagian_id' => $id])
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
    public function actionListmukim($id)
    {
        $countPosts = LookupMukim::find()
        ->where(['district_id' => $id])
        ->count();
         
        $posts = LookupMukim::find() 
        ->where(['district_id' => $id])
        ->all();
         
        if($countPosts>0){
            echo "<option value='Sila Pilih'>Sila Pilih</option>";
            foreach($posts as $post){
                echo "<option value='".$post->mukim_id."'>".$post->mukim."</option>";
            }
        } else {
                echo "<option>-</option>";
        }
     
    }
    public function actionListjohorsubbase($id)
    {
        $countPosts = LookupSubBase::find()
        ->where(['mukim_id' => $id])
        ->count();
         
        $posts = LookupSubBase::find() 
        ->where(['mukim_id' => $id])
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
/* end by shahril */
}
