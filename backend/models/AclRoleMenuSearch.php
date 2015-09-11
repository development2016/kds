<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AclRoleMenu;

/**
 * AclRoleMenuSearch represents the model behind the search form about `backend\models\AclRoleMenu`.
 */
class AclRoleMenuSearch extends AclRoleMenu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_menu_id', 'user_id', 'role_id', 'menu_id'], 'integer'],
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
        $query = AclRoleMenu::find();

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
            'role_menu_id' => $this->role_menu_id,
            'user_id' => $this->user_id,
            'role_id' => $this->role_id,
            'menu_id' => $this->menu_id,
        ]);

        return $dataProvider;
    }
}
