<?php

namespace backend\models;

use Yii;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupKampung;
use common\models\LookupIncome;
use common\models\LookupBangsa;
use common\models\LookupAgama;
use common\models\LookupPerkahwinan;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $nama
 * @property string $email
 * @property string $address
 * @property string $ic_no
 * @property string $mobile_no
 * @property string $home_no
 * @property string $no_tel_pej
 * @property integer $role
 * @property string $pendapatan
 * @property string $pekerjaan
 * @property string $jawatan
 * @property string $mukim
 * @property string $kampung_id
 * @property string $state_id
 * @property string $district_id
 * @property string $kewarganegaraan
 * @property string $status_perkahwinan
 * @property string $bangsa
 * @property string $agama
 * @property string $jantina
 * @property string $bank
 * @property string $no_akaun
 * @property string $tarikh_lahir
 * @property string $tempat_lahir
 * @property string $ic_no_old
 * @property string $poskod
 * @property integer $negara_area_id
 * @property integer $state_area_id
 * @property integer $district_area_id
 * @property integer $sub_base_area_id
 * @property integer $cluster_area_id
 * @property integer $kampung_area_id
 * @property string $status_area
 * @property string $tarikh_daftar_kerja
 * @property string $auth_key
 * @property string $password_hash
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role', 'negara_area_id', 'state_area_id', 'district_area_id', 'sub_base_area_id', 'cluster_area_id', 'kampung_area_id', 'status'], 'integer'],
            [['username', 'pendapatan', 'pekerjaan', 'jawatan', 'kampung_id', 'state_id', 'district_id', 'kewarganegaraan', 'status_perkahwinan', 'tempat_lahir', 'created_at', 'updated_at'], 'string', 'max' => 225],
            [['nama', 'email', 'password_hash'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 200],
            [['ic_no', 'mobile_no', 'home_no', 'no_tel_pej', 'ic_no_old'], 'string', 'max' => 15],
            [['mukim', 'status_area'], 'string', 'max' => 100],
            [['bangsa', 'agama', 'jantina', 'bank', 'no_akaun', 'tarikh_lahir', 'tarikh_daftar_kerja'], 'string', 'max' => 50],
            [['poskod'], 'string', 'max' => 5],
            [['auth_key'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Nama Pengguna',
            'nama' => 'Nama',
            'email' => 'Email',
            'address' => 'Address',
            'ic_no' => 'No Kad Pengenalan',
            'mobile_no' => 'No Tel. Bimbit',
            'home_no' => 'Home No',
            'no_tel_pej' => 'No Tel Pej',
            'role' => 'Role',
            'pendapatan' => 'Pendapatan',
            'pekerjaan' => 'Pekerjaan',
            'jawatan' => 'Jawatan',
            'mukim' => 'Mukim',
            'kampung_id' => 'Kampung ID',
            'state_id' => 'State ID',
            'district_id' => 'District ID',
            'kewarganegaraan' => 'Kewarganegaraan',
            'status_perkahwinan' => 'Status Perkahwinan',
            'bangsa' => 'Bangsa',
            'agama' => 'Agama',
            'jantina' => 'Jantina',
            'bank' => 'Bank',
            'no_akaun' => 'No Akaun',
            'tarikh_lahir' => 'Tarikh Lahir',
            'tempat_lahir' => 'Tempat Lahir',
            'ic_no_old' => 'Ic No Old',
            'poskod' => 'Poskod',
            'negara_area_id' => 'Negara Area ID',
            'state_area_id' => 'State Area ID',
            'district_area_id' => 'District Area ID',
            'sub_base_area_id' => 'Sub Base Area ID',
            'cluster_area_id' => 'Cluster Area ID',
            'kampung_area_id' => 'Kampung Area ID',
            'status_area' => 'Status Area',
            'tarikh_daftar_kerja' => 'Tarikh Daftar Kerja',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'status' => 'Status Akaun',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getRoles()
    {
        return $this->hasOne(LookupRole::className(), ['role_id' => 'role']);
    }


         /**
     * @return \yii\db\ActiveQuery
     */
     public function getState()
    {
        return $this->hasOne(LookupState::className(), ['state_id' => 'state_area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(LookupDistrict::className(), ['district_id' => 'district_area_id']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubBase()
    {
        return $this->hasOne(LookupSubBase::className(), ['sub_base_id' => 'sub_base_area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKampung()
    {
        return $this->hasOne(LookupKampung::className(), ['kampung_id' => 'kampung_area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCluster()
    {
        return $this->hasOne(LookupCluster::className(), ['cluster_id' => 'cluster_area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
     public function getIncomes()
    {
        return $this->hasOne(LookupIncome::className(), ['id' => 'pendapatan']);
    }

     public function getBangsas()
    {
        return $this->hasOne(LookupBangsa::className(), ['id' => 'bangsa']);
    }
    public function getAgamas()
    {
        return $this->hasOne(LookupAgama::className(), ['id' => 'agama']);
    }
    public function getKahwin()
    {
        return $this->hasOne(LookupPerkahwinan::className(), ['id' => 'status_perkahwinan']);
    }
}
