<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clubinfo;

/**
 * ClubinfoSearch represents the model behind the search form of `app\models\Clubinfo`.
 */
class ClubinfoSearch extends Clubinfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'club_num', 'pool', 'childrenroom', 'tennistable', 'parking'], 'integer'],
            [['maininfo', 'gyminfo', 'poolinfo', 'spainfo', 'fightinfo', 'grouptraininfo', 'childreninfo', 'tennisinfo', 'barinfo', 'creditinfo', 'massageinfo', 'schedulelink', 'abonementslink', 'fitneslink'], 'safe'],
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

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Clubinfo::find();

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
            'club_num' => $this->club_num,
            'pool' => $this->pool,
            'childrenroom' => $this->childrenroom,
            'tennistable' => $this->tennistable,
            'parking' => $this->parking,
        ]);

        $query->andFilterWhere(['like', 'maininfo', $this->maininfo])
            ->andFilterWhere(['like', 'gyminfo', $this->gyminfo])
            ->andFilterWhere(['like', 'poolinfo', $this->poolinfo])
            ->andFilterWhere(['like', 'spainfo', $this->spainfo])
            ->andFilterWhere(['like', 'fightinfo', $this->fightinfo])
            ->andFilterWhere(['like', 'grouptraininfo', $this->grouptraininfo])
            ->andFilterWhere(['like', 'childreninfo', $this->childreninfo])
            ->andFilterWhere(['like', 'tennisinfo', $this->tennisinfo])
            ->andFilterWhere(['like', 'barinfo', $this->barinfo])
            ->andFilterWhere(['like', 'creditinfo', $this->creditinfo])
            ->andFilterWhere(['like', 'massageinfo', $this->massageinfo])
            ->andFilterWhere(['like', 'schedulelink', $this->schedulelink])
            ->andFilterWhere(['like', 'abonementslink', $this->abonementslink])
            ->andFilterWhere(['like', 'fitneslink', $this->fitneslink]);

        return $dataProvider;
    }
}
