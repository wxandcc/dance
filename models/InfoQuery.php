<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Info;

/**
 * InfoQuery represents the model behind the search form about `app\models\Info`.
 */
class InfoQuery extends Info
{
    public $_search_date_from;
    public $_search_date_end;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'cls', 'from', 'banner', 'content', 'created_time', 'updated_time'], 'safe'],
            [['_search_date_from', '_search_date_end', ], 'safe'],
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
        $query = Info::find();

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
            'id' => $this->id
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'cls', $this->cls])
            ->andFilterWhere(['like', 'from', $this->from])
            ->andFilterWhere(['like', 'banner', $this->banner])
            ->andFilterWhere(['like', 'content', $this->content]);

        if($this->_search_date_end){
            $query->andFilterWhere(['<', 'created_time', date('Y-m-d H:i:s',strtotime($this->_search_date_end))]);
        }
        if($this->_search_date_from){
            $query->andFilterWhere(['>', 'created_time', date('Y-m-d H:i:s',strtotime($this->_search_date_from))]);
        }

        return $dataProvider;
    }
}
