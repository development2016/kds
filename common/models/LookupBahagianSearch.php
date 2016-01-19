<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LookupBahagian;

/**
 * LookupBahagianSearch represents the model behind the search form about `common\models\LookupBahagian`.
 */
class LookupBahagianSearch extends LookupBahagian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bahagian_id', 'state_id'], 'integer'],
            [['bahagian'], 'safe'],
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
        $query = LookupBahagian::find();

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
            'bahagian_id' => $this->bahagian_id,
            'state_id' => $this->state_id,
        ]);

        $query->andFilterWhere(['like', 'bahagian', $this->bahagian]);

        return $dataProvider;
    }
}
