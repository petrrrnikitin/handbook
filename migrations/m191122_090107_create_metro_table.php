<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%metro}}`.
 */
class m191122_090107_create_metro_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%metro}}', [
            'id' => $this->primaryKey(),
            'metro' => $this->string(),
            'district_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%metro}}');
    }
}
