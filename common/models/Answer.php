<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "answer".
 *
 * @property integer $id_answer
 * @property string $answer
 * @property integer $question_id
 * @property integer $people_id
 *
 * @property People $people
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['answer'],'default','value'=>'Tidak'],
            [['question_id', 'people_id'], 'integer'],
            [['answer'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_answer' => 'Id Answer',
            'answer' => 'Answer',
            'question_id' => 'Question ID',
            'people_id' => 'People ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasOne(People::className(), ['people_id' => 'people_id']);
    }

    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['question_id' => 'question_id']);
    }
}
