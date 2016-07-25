<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cls;

/**
 * ClsQuery represents the model behind the search form about `app\models\Cls`.
 */
class ClsQuery extends Cls
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hard', 'age', 'clsTime'], 'integer'],
            [['name', 'cls', 'des', 'showCls', 'clsAim', 'clsNotice', 'created_time', 'updated_time'], 'safe'],
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
        $query = Cls::find();

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
            'hard' => $this->hard,
            'age' => $this->age,
            'clsTime' => $this->clsTime,
            'created_time' => $this->created_time,
            'updated_time' => $this->updated_time,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'cls', $this->cls])
            ->andFilterWhere(['like', 'des', $this->des])
            ->andFilterWhere(['like', 'showCls', $this->showCls])
            ->andFilterWhere(['like', 'clsAim', $this->clsAim])
            ->andFilterWhere(['like', 'clsNotice', $this->clsNotice]);

        return $dataProvider;
    }
}
