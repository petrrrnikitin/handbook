<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clubs".
 *
 * @property int $num
 * @property string|null $site_name
 * @property int|null $city_id
 * @property int|null $district_id
 * @property int|null $metro_id
 * @property string|null $address
 * @property int|null $category
 * @property int|null $type
 * @property int|null $active
 * @property int|null $status
 * @property string|null $map_longitude
 * @property string|null $map_latitude
 *
 * @property Clubinfo[] $clubinfos
 * @property City $city
 * @property District $district
 * @property Metro $metro
 * @property Price[] $prices
 */
class Clubs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clubs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'district_id', 'metro_id', 'category', 'type', 'active', 'status'], 'integer'],
            [['site_name', 'address','map_longitude','map_latitude'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['district_id' => 'id']],
            [['metro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Metro::className(), 'targetAttribute' => ['metro_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'num' => 'Num',
            'site_name' => 'Название',
            'city_id' => 'Город',
            'district_id' => 'Район',
            'metro_id' => 'Метро',
            'address' => 'Адрес',
            'category' => 'Категория',
            'type' => 'Type',
            'active' => 'Active',
            'status' => 'Статус',
            'map_longitude' => 'Долгота',
            'map_latitude' => 'Широта'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClubinfos()
    {
        return $this->hasOne(Clubinfo::className(), ['club_num' => 'num']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return int|null
     */
    public function getCityName()
    {
        $city = $this->city;
        return $city ? $city->name : '';
    }

    public function getDistrictDistrict()
    {
        $district = $this->district;
        return $district ? $district->district : '';
    }
    public function getMetroMetro()
    {
        return $this->metro ? $this->metro->metro : '';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMetro()
    {
        return $this->hasOne(Metro::className(), ['id' => 'metro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrices()
    {
        return $this->hasMany(Price::className(), ['club_num' => 'num']);
    }

    public function getMapkey()
    {
        return $this->hasOne(Mapkey::className(), ['city_id' => 'id'])->via('city');
    }
}
