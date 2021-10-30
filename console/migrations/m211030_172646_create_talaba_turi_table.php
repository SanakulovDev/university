<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%talaba_turi}}`.
 */
class m211030_172646_create_talaba_turi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%talaba_turi}}', [
            'id' => $this->primaryKey(),
            'nomi' => $this->string(50)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%talaba_turi}}');
    }
}
