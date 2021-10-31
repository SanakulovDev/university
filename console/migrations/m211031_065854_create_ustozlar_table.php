<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ustozlar}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%kafedralar}}`
 */
class m211031_065854_create_ustozlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ustozlar}}', [
            'id' => $this->primaryKey(),
            'kafedra_id' => $this->integer(),
            'ismi' => $this->string(25)->notNull(),
            'familiyasi' => $this->string(40)->notNull(),
            'telefon' => $this->string(30)->notNull(),
        ]);

        // creates index for column `kafedra_id`
        $this->createIndex(
            '{{%idx-ustozlar-kafedra_id}}',
            '{{%ustozlar}}',
            'kafedra_id'
        );

        // add foreign key for table `{{%kafedralar}}`
        $this->addForeignKey(
            '{{%fk-ustozlar-kafedra_id}}',
            '{{%ustozlar}}',
            'kafedra_id',
            '{{%kafedralar}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%kafedralar}}`
        $this->dropForeignKey(
            '{{%fk-ustozlar-kafedra_id}}',
            '{{%ustozlar}}'
        );

        // drops index for column `kafedra_id`
        $this->dropIndex(
            '{{%idx-ustozlar-kafedra_id}}',
            '{{%ustozlar}}'
        );

        $this->dropTable('{{%ustozlar}}');
    }
}
