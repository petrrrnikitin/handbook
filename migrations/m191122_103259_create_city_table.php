<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%city}}`.
 */
class m191122_103259_create_city_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey(),
            'code' => $this->text(),
            'name' => $this->string(),
            'service_phone_code' => $this->integer(),
            'service_phone' => $this->biginteger(),
            'msktz_bias_min' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%city}}');
    }
}
