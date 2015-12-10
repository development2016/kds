<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tanggungan".
 *
 * @property integer $tanggungan_id
 * @property string $nama_tanggungan
 * @property string $no_ic_tanggungan
 * @property string $tarikh_lahir
 * @property integer $edu_level
 * @property string $tanggungan_kerja
 * @property integer $hubungan
 * @property string $tanggungan_oku
 * @property string $note
 * @property integer $people_id
 */
class Tanggungan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tanggungan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edu_level', 'hubungan', 'people_id'], 'integer'],
            [['nama_tanggungan', 'tarikh_lahir', 'tanggungan_kerja', 'tanggungan_oku', 'note'], 'string', 'max' => 225],
            //[['tanggungan_kerja','tanggungan_oku'],'default','value'=>'Tidak'],
            [['no_ic_tanggungan'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tanggungan_id' => 'Tanggungan ID',
            'nama_tanggungan' => 'Nama',
            'no_ic_tanggungan' => 'No Kad Pengenalan',
            'tarikh_lahir' => 'Tarikh Lahir',
            'edu_level' => 'Tahap Pendidikan',
            'tanggungan_kerja' => 'Bekerja',
            'hubungan' => 'Hubungan',
            'tanggungan_oku' => 'Orang Kelainan Upaya',
            'note' => 'Nota',
            'people_id' => 'People ID',
        ];
    }
}
