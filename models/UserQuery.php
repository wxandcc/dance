<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserQuery represents the model behind the search form about `app\models\User`.
 */
class UserQuery extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'superman', 'status', 'login_time', 'login_count', 'update_password'], 'integer'],
            [['username', 'password', 'created_time', 'updated_time', 'login_ip', 'config'], 'safe'],
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
        $query = User::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'superman' => $this->superman,
            'created_time' => $this->created_time,
            'updated_time' => $this->updated_time,
            'status' => $this->status,
            'login_time' => $this->login_time,
            'login_count' => $this->login_count,
            'update_password' => $this->update_password,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'login_ip', $this->login_ip])
            ->andFilterWhere(['like', 'config', $this->config]);

        return $dataProvider;
    }
}
