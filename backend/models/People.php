<?php

namespace backend\models;

use Yii;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupMukim;
use common\models\LookupKampung;
use common\models\Answer;
use common\models\Wife;
use common\models\LookupAgama;
use common\models\LookupBangsa;
use common\models\LookupPerkahwinan;
use common\models\LookupIncome;
use common\models\LookupSpending;
/**
 * This is the model class for table "people".
 *
 * @property integer $people_id
 * @property string $name
 * @property string $ic_no
 * @property string $address
 * @property string $postcode
 * @property string $dob
 * @property string $gender
 * @property integer $race
 * @property string $name_nick
 * @property string $ic_no_old
 * @property string $current_address
 * @property string $state_id
 * @property string $district_id
 * @property string $sub_base_id
 * @property string $cluster_id
 * @property string $kampung_id
 * @property string $birth_place
 * @property integer $religion
 * @property string $citizen
 * @property integer $marital_status
 * @property integer $no_of_children
 * @property string $profession_status
 * @property string $profession
 * @property string $job_position
 * @property string $job_else
 * @property integer $income
 * @property integer $spending
 * @property string $mobile_no
 * @property string $home_no
 * @property string $email
 * @property string $penghulu
 * @property string $local_champion
 * @property string $volunteer
 * @property string $micro_worker
 * @property resource $image
 * @property string $enter_date
 * @property integer $enter_by
 * @property string $data_status
 * @property string $verified_date
 * @property integer $verified_by
 * @property string $flag
 * @property string $mukim
 * @property string $tarikh_soal_selidik
 * @property string $nota
 * @property string $ruang_cadangan
 * @property string $oku
 * @property string $tanggungan_oku
 */
class People extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'people';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['race', 'religion', 'marital_status', 'no_of_children', 'income', 'spending', 'enter_by', 'verified_by'], 'integer'],
            [['image'], 'string'],
            [['enter_date', 'verified_date'], 'safe'],
            ['ic_no', 'unique'],
            //['email','email','message'=>'Sila Masukkan Email Yang Sah'],
            ['ic_no', 'required', 'message' => 'Sila Isi No Kad Pengenalan'],
            ['name', 'required', 'message' => 'Sila Isi Nama Sukarelawan'],
            //['country_id', 'required', 'message' => 'Sila Isi Negara'],
            ['state_id', 'required', 'message' => 'Sila Pilih Negeri '],
            ['district_id', 'required', 'message' => 'Sila Pilih Daerah'],
            ['sub_base_id', 'required', 'message' => 'Sila Pilih Sub Base'],
            ['cluster_id', 'required', 'message' => 'Sila Pilih Cluster'],
            ['kampung_id', 'required', 'message' => 'Sila Pilih Kampung'],
            //['mukim_id', 'required', 'message' => 'Sila Isi Mukim'],
            ['oku', 'required', 'message' => 'Sila Nyatakan Sama Ada Anda Tergolong Dalam Orang OKU Atau Tidak'],
            [['oku','tanggungan_oku'],'default','value'=>'Tidak'],

            [['name', 'address', 'name_nick', 'current_address', 'mukim'], 'string', 'max' => 225],
            [['ic_no', 'postcode', 'dob', 'gender', 'ic_no_old', 'state_id', 'district_id', 'sub_base_id', 'cluster_id', 'kampung_id','mukim_id', 'birth_place', 'citizen', 'profession_status', 'profession', 'job_position', 'job_else', 'mobile_no', 'home_no', 'email', 'penghulu', 'local_champion', 'volunteer', 'micro_worker', 'data_status', 'flag', 'tarikh_soal_selidik','oku','tanggungan_oku'], 'string', 'max' => 45],
            [['nota', 'ruang_cadangan'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'people_id' => 'People ID',
            'name' => 'Nama',
            'ic_no' => 'No Kad Pengenalan (Baru)',
            'address' => 'Alamat',
            'postcode' => 'Poskod',
            'dob' => 'Tarikh Lahir',
            'gender' => 'Jantina',
            'race' => 'Bangsa',
            'name_nick' => 'Nama Samaran',
            'ic_no_old' => 'No Kad Pengenalan (Lama)',
            'current_address' => 'Alamat Semasa',
            'country_id' => 'Negara',
            'state_id' => 'Negeri',
            'district_id' => 'Daerah',
            'sub_base_id' => 'Sub Base',
            'cluster_id' => 'Cluster',
            'kampung_id' => 'Kampung',
            'mukim_id' => 'Mukim',
            'birth_place' => 'Tempat Lahir',
            'religion' => 'Agama',
            'citizen' => 'Warganegara',
            'marital_status' => 'Status Perkahwinan',
            'no_of_children' => 'Bilangan Anak',
            'profession_status' => 'Status Pekerjaan',
            'profession' => 'Pekerjaan',
            'job_position' => 'Jawatan',
            'job_else' => 'Pekerjaan Lain',
            'income' => 'Pendapatan',
            'spending' => 'Perbelanjaan',
            'mobile_no' => 'No.Tel.Bimbit',
            'home_no' => 'No.Rumah',
            'email' => 'Email',
            'penghulu' => 'Penghulu',
            'local_champion' => 'Local Champion',
            'volunteer' => 'Volunteer',
            'micro_worker' => 'Micro Worker',
            'image' => 'Image',
            'enter_date' => 'Tarikh Dimasukkan',
            'enter_by' => 'Dimasukkan Oleh',
            'data_status' => 'Status Data',
            'verified_date' => 'Tarikh DiSahkan',
            'verified_by' => 'Disahkan Oleh',
            'flag' => 'Flag',
            'mukim' => 'Mukim',
            'tarikh_soal_selidik' => 'Tarikh Soal Selidik',
            'nota' => 'Nota',
            'ruang_cadangan' => 'Ruang Cadangan Minat',
            'oku' => 'OKU',
            'tanggungan_oku' => 'tanggungan_oku',
        ];
    }
        /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['people_id' => 'people_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWives()
    {
        return $this->hasMany(Wife::className(), ['people_id' => 'people_id']);
    }
        public function getKampung()
    {
        return $this->hasOne(LookupKampung::className(), ['kampung_id' => 'kampung_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCluster()
    {
        return $this->hasOne(LookupCluster::className(), ['cluster_id' => 'cluster_id']);
    }
    public function getMukims()
    {
        return $this->hasOne(LookupMukim::className(), ['mukim_id' => 'mukim_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(LookupDistrict::className(), ['district_id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(LookupState::className(), ['state_id' => 'state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubBase()
    {
        return $this->hasOne(LookupSubBase::className(), ['sub_base_id' => 'sub_base_id']);
    }

    public function getAgama()
    {
        return $this->hasOne(LookupAgama::className(), ['id' => 'religion']);
    }
    public function getBangsa()
    {
        return $this->hasOne(LookupBangsa::className(), ['id' => 'race']);
    }
    public function getKahwin()
    {
        return $this->hasOne(LookupPerkahwinan::className(), ['id' => 'marital_status']);
    }

    public function getIncomes()
    {
        return $this->hasOne(LookupIncome::className(), ['id' => 'income']);
    }

    public function getSpendings()
    {
        return $this->hasOne(LookupSpending::className(), ['id' => 'spending']);
    }

    public function getEnter(){
         return $this->hasOne(User::className(), ['id' => 'enter_by']);
    }

    public function getVerified(){
        return $this->hasOne(User::className(), ['id' => 'verified_by']);
    }
}
