<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Tanggungan;

/**
 * TanggunganSearch represents the model behind the search form about `common\models\Tanggungan`.
 */
class TanggunganSearch extends Tanggungan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggungan_id', 'edu_level', 'hubungan', 'people_id'], 'integer'],
            [['nama_tanggungan', 'no_ic_tanggungan', 'tarikh_lahir', 'tanggungan_kerja', 'tanggungan_oku', 'note'], 'safe'],
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
        $query = Tanggungan::find();

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
            'tanggungan_id' => $this->tanggungan_id,
            'edu_level' => $this->edu_level,
            'hubungan' => $this->hubungan,
            'people_id' => $this->people_id,
        ]);

        $query->andFilterWhere(['like', 'nama_tanggungan', $this->nama_tanggungan])
            ->andFilterWhere(['like', 'no_ic_tanggungan', $this->no_ic_tanggungan])
            ->andFilterWhere(['like', 'tarikh_lahir', $this->tarikh_lahir])
            ->andFilterWhere(['like', 'tanggungan_kerja', $this->tanggungan_kerja])
            ->andFilterWhere(['like', 'tanggungan_oku', $this->tanggungan_oku])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
