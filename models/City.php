<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property int|null $service_phone_code
 * @property int|null $service_phone
 * @property int|null $msktz_bias_min
 *
 * @property Clubs[] $clubs
 * @property District[] $districts
 * @property Mapkey[] $mapkeys
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'string'],
            [['service_phone_code', 'service_phone', 'msktz_bias_min'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'service_phone_code' => 'Service Phone Code',
            'service_phone' => 'Service Phone',
            'msktz_bias_min' => 'Msktz Bias Min',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClubs()
    {
        return $this->hasMany(Clubs::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts()
    {
        return $this->hasMany(District::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMapkeys()
    {
        return $this->hasMany(Mapkey::className(), ['city_id' => 'id']);
    }
}
