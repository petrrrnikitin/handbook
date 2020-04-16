<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%district}}`.
 */
class m191122_090146_create_district_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%district}}', [
            'id' => $this->primaryKey(),
            'district' => $this->string(),
            'city_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%district}}');
    }
}
