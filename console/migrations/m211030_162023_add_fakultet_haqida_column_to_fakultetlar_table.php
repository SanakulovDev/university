<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%fakultetlar}}`.
 */
class m211030_162023_add_fakultet_haqida_column_to_fakultetlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%fakultetlar}}', 'fakultet_haqida', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%fakultetlar}}', 'fakultet_haqida');
    }
}
