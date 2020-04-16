<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "price".
 *
 * @property int $id
 * @property string|null $type
 * @property int|null $club_num
 * @property int|null $price
 * @property string|null $period
 * @property string|null $cardtime
 * @property int|null $webdiscount
 *
 * @property Clubs $clubNum
 */
class Price extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'price';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['club_num', 'price', 'webdiscount'], 'integer'],
            [['type', 'period', 'cardtime'], 'string', 'max' => 255],
            [['club_num'], 'exist', 'skipOnError' => true, 'targetClass' => Clubs::className(), 'targetAttribute' => ['club_num' => 'num']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'club_num' => 'Club Num',
            'price' => 'Price',
            'period' => 'Period',
            'cardtime' => 'Cardtime',
            'webdiscount' => 'Webdiscount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClubNum()
    {
        return $this->hasOne(Clubs::className(), ['num' => 'club_num']);
    }
}
