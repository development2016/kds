<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ManagerTrain;

/**
 * ManagerTrainSearch represents the model behind the search form about `common\models\ManagerTrain`.
 */
class ManagerTrainSearch extends ManagerTrain
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cat_id', 'state_id', 'district_id', 'mukim_id', 'sub_base_id', 'cluster_id', 'kampung_id', 'enter_by'], 'integer'],
            [['rangkaian_fasiliti_awam', 'location', 'alamat', 'poskod', 'nama_pengurus', 'ic', 'jantina', 'no_fon', 'date_enter'], 'safe'],
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
        $query = ManagerTrain::find();

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
            'cat_id' => $this->cat_id,
            'state_id' => $this->state_id,
            'district_id' => $this->district_id,
            'mukim_id' => $this->mukim_id,
            'sub_base_id' => $this->sub_base_id,
            'cluster_id' => $this->cluster_id,
            'kampung_id' => $this->kampung_id,
            'enter_by' => $this->enter_by,
        ]);

        $query->andFilterWhere(['like', 'rangkaian_fasiliti_awam', $this->rangkaian_fasiliti_awam])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'poskod', $this->poskod])
            ->andFilterWhere(['like', 'nama_pengurus', $this->nama_pengurus])
            ->andFilterWhere(['like', 'ic', $this->ic])
            ->andFilterWhere(['like', 'jantina', $this->jantina])
            ->andFilterWhere(['like', 'no_fon', $this->no_fon])
            ->andFilterWhere(['like', 'date_enter', $this->date_enter]);

        return $dataProvider;
    }
}
