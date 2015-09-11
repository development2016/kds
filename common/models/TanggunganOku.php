<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tanggungan_oku".
 *
 * @property integer $id
 * @property string $nama
 * @property string $umur
 * @property integer $hubungan
 * @property string $no_pendaftaran
 * @property integer $kategori
 * @property string $nota
 * @property integer $tahap_pendidikan
 * @property string $nama_sekolah
 * @property integer $people_id
 */
class TanggunganOku extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tanggungan_oku';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hubungan', 'kategori', 'tahap_pendidikan', 'people_id'], 'integer'],
            [['nama', 'nama_sekolah'], 'string', 'max' => 225],
            [['umur', 'no_pendaftaran'], 'string', 'max' => 45],
            [['nota'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'umur' => 'Umur',
            'hubungan' => 'Hubungan',
            'no_pendaftaran' => 'No Pendaftaran',
            'kategori' => 'Kategori',
            'nota' => 'Nota',
            'tahap_pendidikan' => 'Tahap Pendidikan',
            'nama_sekolah' => 'Nama Sekolah',
            'people_id' => 'People ID',
        ];
    }
}
