<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_pfn_category".
 *
 * @property integer $cat_id
 * @property string $cat_name
 */
class LookupPfnCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_pfn_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_name'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => 'Cat ID',
            'cat_name' => 'Kategori Rangkaian Fasiliti Awam',
        ];
    }
}
