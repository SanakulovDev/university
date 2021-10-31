<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%rektor}}`.
 */
class m211031_095410_add_image_column_to_rektor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%rektor}}', 'image', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%rektor}}', 'image');
    }
}
