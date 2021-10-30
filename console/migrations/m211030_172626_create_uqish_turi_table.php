<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%uqish_turi}}`.
 */
class m211030_172626_create_uqish_turi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%uqish_turi}}', [
            'id' => $this->primaryKey(),
            'nomi' => $this->string(50)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%uqish_turi}}');
    }
}
