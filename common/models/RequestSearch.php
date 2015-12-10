<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Request;

/**
 * RequestSearch represents the model behind the search form about `common\models\Request`.
 */
class RequestSearch extends Request
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'menu_id', 'enter_by','request_id'], 'integer'],
            [['catatan', 'status', 'enter_date'], 'safe'],
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
        $query = Request::find();

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
            'menu_id' => $this->menu_id,
            'enter_by' => $this->enter_by,
            'request_id' => $this->request_id,
        ]);

        $query->andFilterWhere(['like', 'catatan', $this->catatan])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'enter_date', $this->enter_date]);

        return $dataProvider;
    }
}
