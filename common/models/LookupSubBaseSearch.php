<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LookupSubBase;

/**
 * LookupSubBaseSearch represents the model behind the search form about `common\models\LookupSubBase`.
 */
class LookupSubBaseSearch extends LookupSubBase
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sub_base_id', 'district_id', 'state_id','mukim_id'], 'integer'],
            [['sub_base', 'sub_base_code'], 'safe'],
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
        $query = LookupSubBase::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['sub_base_id' => 'DESC']]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'sub_base_id' => $this->sub_base_id,
            'district_id' => $this->district_id,
            'state_id' => $this->state_id,
            'mukim_id' => $this->mukim_id,
        ]);

        $query->andFilterWhere(['like', 'sub_base', $this->sub_base])
            ->andFilterWhere(['like', 'sub_base_code', $this->sub_base_code]);

        return $dataProvider;
    }
}
