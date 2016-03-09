<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "answer_temp".
 *
 * @property integer $id
 * @property string $jawapan
 * @property integer $question_temp_id
 * @property integer $people_id
 */
class AnswerTemp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'answer_temp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_temp_id', 'people_id'], 'integer'],
            [['jawapan'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jawapan' => 'Jawapan',
            'question_temp_id' => 'Question Temp ID',
            'people_id' => 'People ID',
        ];
    }
        public function getPeople()
    {
        return $this->hasOne(People::className(), ['people_id' => 'people_id']);
    }

    public function getQuestion()
    {
        return $this->hasOne(QuestionTemp::className(), ['id' => 'question_temp_id']);
    }
}
