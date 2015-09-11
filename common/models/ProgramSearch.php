<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Program;

/**
 * ProgramSearch represents the model behind the search form about `common\models\Program`.
 */
class ProgramSearch extends Program
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['program_id', 'org_id', 'sector_id', 'field_id', 'enter_by'], 'integer'],
            [['program_name', 'organize_by', 'program_milestone', 'date_register', 'program_status', 'note', 'date_enter'], 'safe'],
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
        $query = Program::find();

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
            'program_id' => $this->program_id,
            'org_id' => $this->org_id,
            'sector_id' => $this->sector_id,
            'field_id' => $this->field_id,
            'enter_by' => $this->enter_by,
        ]);

        $query->andFilterWhere(['like', 'program_name', $this->program_name])
            ->andFilterWhere(['like', 'organize_by', $this->organize_by])
            ->andFilterWhere(['like', 'program_milestone', $this->program_milestone])
            ->andFilterWhere(['like', 'date_register', $this->date_register])
            ->andFilterWhere(['like', 'program_status', $this->program_status])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'date_enter', $this->date_enter]);

        return $dataProvider;
    }
}
