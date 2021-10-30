<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rektor}}`.
 */
class m211030_181542_create_rektor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rektor}}', [
            'id' => $this->primaryKey(),
            'ismi' => $this->string(30)->notNull(),
            'familiyasi' => $this->string(100)->notNull(),
            'otasining_ismi' => $this->string(100)->notNull(),
            'telefon' => $this->string(30)->notNull(),
            'email' => $this->string(70)->notNull(),
            'qabul_vaqti' => $this->string(40)->notNull(),
            'vazifalari' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rektor}}');
    }
}
