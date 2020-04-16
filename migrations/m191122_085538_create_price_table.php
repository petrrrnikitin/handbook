<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%price}}`.
 */
class m191122_085538_create_price_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%price}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
            'club_num' => $this->integer(),
            'price' => $this->integer(),
            'period' => $this->string(),
            'cardtime' => $this->string(),
            'webdiscount' => $this->integer(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%price}}');

    }
}
