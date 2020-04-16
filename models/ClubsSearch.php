<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;




/**
 * ClubsSearch represents the model behind the search form of `app\models\Clubs`.
 */
class ClubsSearch extends Clubs
{
    public $pool;
    public $tennistable;
    public $childrenroom;
    public $parking;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num', 'city_id', 'district_id', 'metro_id', 'category', 'type', 'active','pool', 'tennistable', 'parking'], 'integer'],
            [['site_name', 'address', 'pool', 'tennistable', 'childrenroom', 'parking' ], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function all(){
        $query = Clubs::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        return $dataProvider;

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
        $query = Clubs::find()->where(['status' => '1'])
            ->JoinWith('clubinfos')
            ->JoinWith('prices');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'num' => $this->num,
            'city_id' => $this->city_id,
            'district_id' => $this->district_id,
            'metro_id' => $this->metro_id,
            'category' => $this->category,
            'type' => $this->type,
            'active' => $this->active,
            'tennistable' => $this->tennistable,
            'pool' => $this->pool,
            'parking' => $this->parking,
            'childrenroom' => $this->childrenroom

        ]);

        $query->andFilterWhere(['like', 'site_name', $this->site_name])
            ->andFilterWhere(['like', 'address', $this->address]);


        return $dataProvider;

    }
}
