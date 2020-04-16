<?php

use yii\db\Migration;

/**
 * Class m191122_113713_FK
 */
class m191122_113713_FK extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk-city-club','clubs', 'city_id', 'city', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-district-club', 'clubs', 'district_id','district', 'id');
        $this->addForeignKey('fk-metro-club', 'clubs', 'metro_id','metro', 'id');
        $this->addForeignKey('fk-price-club' , 'price', 'club_num', 'clubs', 'num', 'CASCADE');
        $this->addForeignKey('fk-clubinfo-club', 'clubinfo', 'club_num','clubs', 'num','CASCADE');
        $this->addForeignKey('fk-district-city', 'district', 'city_id', 'city', 'id');
        $this->addForeignKey('fk-metro-district', 'metro', 'district_id', 'district', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-city-club', 'clubs');
        $this->dropForeignKey('fk-district-club', 'clubs');
        $this->dropForeignKey('fk-metro-club' , 'clubs');
        $this->dropForeignKey('fk-price-club', 'price');
        $this->dropForeignKey('fk-clubinfo-club', 'clubinfo');
        $this->dropForeignKey('fk-district-city', 'district');
        $this->dropForeignKey('fk-metro-district', 'metro');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191122_113713_FK cannot be reverted.\n";

        return false;
    }
    */
}
