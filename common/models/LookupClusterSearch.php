<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LookupCluster;

/**
 * LookupClusterSearch represents the model behind the search form about `common\models\LookupCluster`.
 */
class LookupClusterSearch extends LookupCluster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cluster_id', 'sub_base_id', 'district_id', 'state_id','mukim_id'], 'integer'],
            [['cluster', 'cluster_code'], 'safe'],
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
        $query = LookupCluster::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['cluster_id' => 'DESC']]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'cluster_id' => $this->cluster_id,
            'sub_base_id' => $this->sub_base_id,
            'district_id' => $this->district_id,
            'state_id' => $this->state_id,
            'mukim_id' => $this->mukim_id,

        ]);

        $query->andFilterWhere(['like', 'cluster', $this->cluster])
            ->andFilterWhere(['like', 'cluster_code', $this->cluster_code]);

        return $dataProvider;
    }
}
