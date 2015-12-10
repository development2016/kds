<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "members_info".
 *
 * @property integer $id
 * @property string $nama_majikan
 * @property string $alamat_majikan
 * @property integer $state_id_majikan
 * @property string $bandar
 * @property integer $poskod
 * @property string $email_majikan
 * @property string $no_tel
 * @property string $fax
 * @property integer $tujuan_akses
 * @property integer $state_id
 * @property integer $district_id
 * @property integer $mukim_id
 * @property integer $kampung_id
 * @property integer $user_id
 */
class MembersInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'members_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_id_majikan', 'poskod', 'tujuan_akses', 'state_id', 'district_id', 'mukim_id', 'kampung_id', 'user_id'], 'integer'],
            [['nama_majikan', 'alamat_majikan', 'email_majikan'], 'string', 'max' => 225],
            [['bandar'], 'string', 'max' => 50],
            [['no_tel', 'fax'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_majikan' => 'Nama Majikan',
            'alamat_majikan' => 'Alamat Majikan',
            'state_id_majikan' => 'Negeri',
            'bandar' => 'Bandar',
            'poskod' => 'Poskod',
            'email_majikan' => 'Email Majikan',
            'no_tel' => 'No Telefon',
            'fax' => 'Fax',
            'tujuan_akses' => 'Tujuan Akses',
            'state_id' => 'Negeri',
            'district_id' => 'Daerah',
            'mukim_id' => 'Mukim',
            'kampung_id' => 'Kampung',
            'user_id' => 'User ID',
        ];
    }
}
