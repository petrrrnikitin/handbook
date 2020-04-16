<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%clubs}}`.
 */
class m191122_085444_create_clubs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clubs}}', [
            'num' => $this->primaryKey(),
            'site_name' => $this->string(),
            'city_id' => $this->integer(),
            'district_id' => $this->integer(),
            'metro_id' => $this->integer(),
            'address' => $this->string(),
            'category' => $this->integer(),
            'type' => $this->integer(),
            'active' => $this->boolean(),
            'map_longitude' => $this->string(),
            'map_latitude' => $this->string(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%clubs}}');

    }
}
