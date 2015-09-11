<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "people_oku".
 *
 * @property integer $id
 * @property string $no_pendaftaran
 * @property integer $kategori_oku
 * @property string $nota
 * @property integer $people_id
 */
class PeopleOku extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'people_oku';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kategori_oku', 'people_id'], 'integer'],
            [['no_pendaftaran'], 'string', 'max' => 45],
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
            'no_pendaftaran' => 'No Pendaftaran',
            'kategori_oku' => 'Kategori Oku',
            'nota' => 'Nota',
            'people_id' => 'People ID',
        ];
    }


    public function getKategori()
    {
        return $this->hasOne(LookupKategoriOku::className(), ['id' => 'kategori_oku']);
    }
}
