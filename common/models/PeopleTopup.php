<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "people_topup".
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
 * @property integer $mukim_id
 */
class PeopleTopup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'people_topup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['race', 'religion', 'marital_status', 'no_of_children', 'income', 'spending', 'enter_by', 'verified_by', 'mukim_id'], 'integer'],
            [['image'], 'string'],
            [['enter_date', 'verified_date'], 'safe'],
            [['name', 'address', 'name_nick', 'current_address', 'mukim'], 'string', 'max' => 225],
            [['ic_no', 'postcode', 'dob', 'gender', 'ic_no_old', 'state_id', 'district_id', 'sub_base_id', 'cluster_id', 'kampung_id', 'birth_place', 'citizen', 'profession_status', 'profession', 'job_position', 'job_else', 'mobile_no', 'home_no', 'email', 'penghulu', 'local_champion', 'volunteer', 'micro_worker', 'data_status', 'flag', 'tarikh_soal_selidik', 'oku', 'tanggungan_oku'], 'string', 'max' => 45],
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
            'name' => 'Name',
            'ic_no' => 'Ic No',
            'address' => 'Address',
            'postcode' => 'Postcode',
            'dob' => 'Dob',
            'gender' => 'Gender',
            'race' => 'Race',
            'name_nick' => 'Name Nick',
            'ic_no_old' => 'Ic No Old',
            'current_address' => 'Current Address',
            'state_id' => 'State ID',
            'district_id' => 'District ID',
            'sub_base_id' => 'Sub Base ID',
            'cluster_id' => 'Cluster ID',
            'kampung_id' => 'Kampung ID',
            'birth_place' => 'Birth Place',
            'religion' => 'Religion',
            'citizen' => 'Citizen',
            'marital_status' => 'Marital Status',
            'no_of_children' => 'No Of Children',
            'profession_status' => 'Profession Status',
            'profession' => 'Profession',
            'job_position' => 'Job Position',
            'job_else' => 'Job Else',
            'income' => 'Income',
            'spending' => 'Spending',
            'mobile_no' => 'Mobile No',
            'home_no' => 'Home No',
            'email' => 'Email',
            'penghulu' => 'Penghulu',
            'local_champion' => 'Local Champion',
            'volunteer' => 'Volunteer',
            'micro_worker' => 'Micro Worker',
            'image' => 'Image',
            'enter_date' => 'Enter Date',
            'enter_by' => 'Enter By',
            'data_status' => 'Data Status',
            'verified_date' => 'Verified Date',
            'verified_by' => 'Verified By',
            'flag' => 'Flag',
            'mukim' => 'Mukim',
            'tarikh_soal_selidik' => 'Tarikh Soal Selidik',
            'nota' => 'Nota',
            'ruang_cadangan' => 'Ruang Cadangan',
            'oku' => 'Oku',
            'tanggungan_oku' => 'Tanggungan Oku',
            'mukim_id' => 'Mukim ID',
        ];
    }
}
