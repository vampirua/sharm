<?php

use yii\db\Migration;

/**
 * Handles adding varian_photo to table `variant`.
 */
class m180223_092156_add_varian_photo_column_to_variant_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('variant', 'variant_photo', $this->string());
        $this->addColumn('variant', 'quantity', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('variant', 'variant_photo');
        $this->dropColumn('variant', 'quantity');
    }
}
