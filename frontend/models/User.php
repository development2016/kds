<?php

namespace frontend\models;

use Yii;

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
 * @property string $img
 * @property string $tarikh_daftar
 * @property string $pendapatan
 * @property string $pekerjaan
 * @property string $jawatan
 * @property string $mukim
 * @property string $kampung
 * @property string $negara
 * @property string $negeri
 * @property string $daerah
 * @property string $kewarganegaraan
 * @property string $status_perkahwinan
 * @property string $bangsa
 * @property string $agama
 * @property string $jantina
 * @property string $bank
 * @property string $no_akaun
 * @property string $tarikh_lahir
 * @property string $tempat_lahir
 * @property string $last_login
 * @property string $ic_no_old
 * @property string $bandar
 * @property string $poskod
 * @property integer $negara_area_id
 * @property integer $state_area_id
 * @property integer $district_area_id
 * @property integer $sub_base_area_id
 * @property integer $cluster_area_id
 * @property integer $kampong_area_id
 * @property string $status_area
 * @property string $tarikh_daftar_kerja
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
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
            ['nama', 'required', 'message' => 'Sila Isi Nama'],
            ['ic_no', 'required', 'message' => 'Sila Isi No Kad Pengenalan'],
            ['ic_no', 'unique'],
            ['username', 'unique'],
            ['password_hash', 'required', 'message' => 'Sila Isi Kata Laluan'],
            ['username', 'required', 'message' => 'Sila Isi Nama Pengguna'],
            [['role', 'negara_area_id', 'state_area_id', 'district_area_id', 'sub_base_area_id', 'cluster_area_id', 'kampung_area_id', 'status','bahagian_id','mukim_id'], 'integer'],
            [['username', 'nama', 'email', 'password_hash','updated_at','created_at'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 200],
            [['ic_no', 'mobile_no', 'home_no', 'no_tel_pej', 'ic_no_old'], 'string', 'max' => 15],
            [['pendapatan', 'pekerjaan', 'jawatan', 'kampung_id', 'state_id', 'district_id', 'kewarganegaraan', 'status_perkahwinan', 'tempat_lahir'], 'string', 'max' => 225],
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
            'email' => 'E-mail',
            'address' => 'Alamat',
            'ic_no' => 'No Kad Pengenalan',
            'mobile_no' => 'No.Tel(H/P)',
            'home_no' => 'No.Tel(R)',
            'no_tel_pej' => 'No.Tel(Pej)',
            'role' => 'Role',
            'pendapatan' => 'Pendapatan',
            'pekerjaan' => 'Pekerjaan',
            'jawatan' => 'Jawatan',
            'mukim' => 'Mukim',
            'kampung_id' => 'Kampung',
            'state_id' => 'Negeri',
            'district_id' => 'Daerah',
            'kewarganegaraan' => 'Kewarganegaraan',
            'status_perkahwinan' => 'Status Perkahwinan',
            'bangsa' => 'Bangsa',
            'agama' => 'Agama',
            'jantina' => 'Jantina',
            'bank' => 'Bank',
            'no_akaun' => 'No Akaun',
            'tarikh_lahir' => 'Tarikh Lahir',
            'tempat_lahir' => 'Tempat Lahir',
            'ic_no_old' => 'No Kad Pengenalan (Lama)',
            'poskod' => 'Poskod',
            'negara_area_id' => 'Negara',
            'state_area_id' => 'Negeri',
            'district_area_id' => 'Daerah',
            'sub_base_area_id' => 'Sub Base',
            'cluster_area_id' => 'Cluster',
            'kampung_area_id' => 'Kampung',
            'status_area' => 'Status',
            'tarikh_daftar_kerja' => 'Tarikh Daftar Kerja',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Kata Laluan',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'bahagian_id'=>'Bahagian',
            'mukim_id'=>'Mukim',
        ];
    }

}
