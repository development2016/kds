<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TanggunganOku;

/**
 * TanggunganOkuSearch represents the model behind the search form about `common\models\TanggunganOku`.
 */
class TanggunganOkuSearch extends TanggunganOku
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hubungan', 'kategori', 'tahap_pendidikan', 'people_id'], 'integer'],
            [['nama', 'umur', 'no_pendaftaran', 'nota', 'nama_sekolah'], 'safe'],
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
        $query = TanggunganOku::find();

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
            'id' => $this->id,
            'hubungan' => $this->hubungan,
            'kategori' => $this->kategori,
            'tahap_pendidikan' => $this->tahap_pendidikan,
            'people_id' => $this->people_id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'umur', $this->umur])
            ->andFilterWhere(['like', 'no_pendaftaran', $this->no_pendaftaran])
            ->andFilterWhere(['like', 'nota', $this->nota])
            ->andFilterWhere(['like', 'nama_sekolah', $this->nama_sekolah]);

        return $dataProvider;
    }
}
