<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Wife;

/**
 * WifeSearch represents the model behind the search form about `common\models\Wife`.
 */
class WifeSearch extends Wife
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wife_id', 'people_id'], 'integer'],
            [['wife_name', 'wife_ic', 'wife_work', 'wife_oku'], 'safe'],
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
        $query = Wife::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'wife_id' => $this->wife_id,
            'people_id' => $this->people_id,
        ]);

        $query->andFilterWhere(['like', 'wife_name', $this->wife_name])
            ->andFilterWhere(['like', 'wife_ic', $this->wife_ic])
            ->andFilterWhere(['like', 'wife_work', $this->wife_work])
            ->andFilterWhere(['like', 'wife_oku', $this->wife_oku]);

        return $dataProvider;
    }
}
