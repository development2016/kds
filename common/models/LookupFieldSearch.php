<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LookupField;

/**
 * LookupFieldSearch represents the model behind the search form about `common\models\LookupField`.
 */
class LookupFieldSearch extends LookupField
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['field_id'], 'integer'],
            [['field_name'], 'safe'],
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
        $query = LookupField::find();

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
            'field_id' => $this->field_id,
        ]);

        $query->andFilterWhere(['like', 'field_name', $this->field_name]);

        return $dataProvider;
    }
}
