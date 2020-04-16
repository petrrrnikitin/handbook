<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%clubs}}`.
 */
class m191204_080822_add_position_column_to_clubs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%clubs}}', 'status', $this->integer()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%clubs}}', 'status');
    }
}
