<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_kategori_oku".
 *
 * @property integer $id
 * @property string $kategori_oku
 */
class LookupKategoriOku extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_kategori_oku';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kategori_oku'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori_oku' => 'Kategori Oku',
        ];
    }
}
