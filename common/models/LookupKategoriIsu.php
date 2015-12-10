<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_kategori_isu".
 *
 * @property integer $kategori_id
 * @property string $kategori_isu
 */
class LookupKategoriIsu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_kategori_isu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kategori_isu'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kategori_id' => 'Kategori ID',
            'kategori_isu' => 'Kategori Isu',
        ];
    }
}
