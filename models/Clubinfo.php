<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clubinfo".
 *
 * @property int $id
 * @property int|null $club_num
 * @property int|null $pool
 * @property int|null $childrenroom
 * @property int|null $tennistable
 * @property int|null $parking
 * @property string|null $maininfo
 * @property string|null $gyminfo
 * @property string|null $poolinfo
 * @property string|null $spainfo
 * @property string|null $fightinfo
 * @property string|null $grouptraininfo
 * @property string|null $childreninfo
 * @property string|null $tennisinfo
 * @property string|null $barinfo
 * @property string|null $creditinfo
 * @property string|null $massageinfo
 * @property string|null $schedulelink
 * @property string|null $abonementslink
 * @property string|null $fitneslink
 *
 * @property Clubs $clubNum
 */
class Clubinfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clubinfo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'club_num', 'pool', 'childrenroom', 'tennistable', 'parking'], 'integer'],
            [['maininfo', 'gyminfo', 'poolinfo', 'spainfo', 'fightinfo', 'grouptraininfo', 'childreninfo', 'tennisinfo', 'barinfo', 'creditinfo', 'massageinfo'], 'string'],
            [['schedulelink', 'abonementslink', 'fitneslink'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
            'club_num' => 'Club Num',
            'pool' => 'Бассейн',
            'childrenroom' => 'Детская комната',
            'tennistable' => 'Теннисный стол',
            'parking' => 'Парковка',
            'maininfo' => 'Основная информация',
            'gyminfo' => 'Информация о тренажерном зале',
            'poolinfo' => 'Информация о бассейне',
            'spainfo' => 'Информация о СПА',
            'fightinfo' => 'Информация о зале единоборств',
            'grouptraininfo' => 'Информация о залах групповых программ',
            'childreninfo' => 'Информация о детской комнате',
            'tennisinfo' => 'Информация о теннисных столах',
            'barinfo' => 'Информация о баре',
            'creditinfo' => 'Информация о рассрочке',
            'massageinfo' => 'Информация о массаже',
            'schedulelink' => 'Ссылка на расписание',
            'abonementslink' => 'Ссылка на абонементы ИМ',
            'fitneslink' => 'Ссылка на фитнес ИМ',
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
