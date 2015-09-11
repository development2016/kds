<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lookup_pfn_rating".
 *
 * @property integer $rating_id
 * @property string $description
 */
class LookupPfnRating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_pfn_rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rating_id' => 'Rating ID',
            'description' => 'Description',
        ];
    }
}
