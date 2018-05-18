<?php

use yii\db\Migration;

class m171117_120054_fk_category_product extends Migration
{
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-product-category',
            '{{%product}}',
            'category_id',
            '{{%category}}',
            'id'
        );

    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-product-category', 'product');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171117_120054_fk_category_product cannot be reverted.\n";

        return false;
    }
    */
}
