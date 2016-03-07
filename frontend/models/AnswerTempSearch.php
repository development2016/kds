<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\AnswerTemp;

/**
 * AnswerTempSearch represents the model behind the search form about `frontend\models\AnswerTemp`.
 */
class AnswerTempSearch extends AnswerTemp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'question_temp_id', 'people_id'], 'integer'],
            [['jawapan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AnswerTemp::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'question_temp_id' => $this->question_temp_id,
            'people_id' => $this->people_id,
        ]);

        $query->andFilterWhere(['like', 'jawapan', $this->jawapan]);

        return $dataProvider;
    }
}
