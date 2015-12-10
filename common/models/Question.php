<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property integer $question_id
 * @property integer $question_set_id
 * @property string $soalan
 * @property string $question_owner
 * @property integer $field_id
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_set_id', 'field_id'], 'integer'],
            [['soalan'], 'string', 'max' => 225],
            [['question_owner'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'question_id' => 'Question ID',
            'question_set_id' => 'Question Set ID',
            'soalan' => 'Soalan',
            'question_owner' => 'Question Owner',
            'field_id' => 'Field ID',
        ];
    }
}
