<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%clubinfo}}`.
 */
class m191122_095250_create_clubinfo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clubinfo}}', [
            'id' => $this->primaryKey(),
            'club_num' => $this->integer(),
            'pool' => $this->boolean(),
            'childrenroom' => $this->boolean(),
            'tennistable' => $this->boolean(),
            'parking' => $this->boolean(),
            'maininfo' => $this->text(),
			'gyminfo' => $this->text(),
            'poolinfo' => $this->text(),
            'spainfo' => $this->text(),
            'fightinfo' => $this->text(),
            'grouptraininfo' => $this->text(),
            'childreninfo' => $this->text(),
            'tennisinfo' => $this->text(),
            'barinfo' => $this->text(),
            'creditinfo' => $this->text(),
            'massageinfo' => $this->text(),
            'schedulelink' => $this->string(),
            'abonementslink' => $this->string(),
            'fitneslink' => $this->string(),

        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%clubinfo}}');
    }
}
