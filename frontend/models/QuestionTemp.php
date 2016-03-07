<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "question_temp".
 *
 * @property integer $id
 * @property string $soalan_temp
 */
class QuestionTemp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_temp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['soalan_temp'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'soalan_temp' => 'Soalan Temp',
        ];
    }
}
