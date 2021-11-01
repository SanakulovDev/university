<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%ustozlar}}`.
 */
class m211101_045137_add_image_column_to_ustozlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%ustozlar}}', 'image', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%ustozlar}}', 'image');
    }
}
