<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Fakultetlar}}`.
 */
class m211030_161036_create_Fakultetlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Fakultetlar}}', [
            'id' => $this->primaryKey(),
            'fakultet_nomi' => $this->string(100)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Fakultetlar}}');
    }
}
