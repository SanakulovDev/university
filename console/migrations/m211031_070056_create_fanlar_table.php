<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%fanlar}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%ustozlar}}`
 */
class m211031_070056_create_fanlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%fanlar}}', [
            'id' => $this->primaryKey(),
            'ustozlar_id' => $this->integer(),
            'fanlar_nomi' => $this->string(100)->notNull(),
        ]);

        // creates index for column `ustozlar_id`
        $this->createIndex(
            '{{%idx-fanlar-ustozlar_id}}',
            '{{%fanlar}}',
            'ustozlar_id'
        );

        // add foreign key for table `{{%ustozlar}}`
        $this->addForeignKey(
            '{{%fk-fanlar-ustozlar_id}}',
            '{{%fanlar}}',
            'ustozlar_id',
            '{{%ustozlar}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%ustozlar}}`
        $this->dropForeignKey(
            '{{%fk-fanlar-ustozlar_id}}',
            '{{%fanlar}}'
        );

        // drops index for column `ustozlar_id`
        $this->dropIndex(
            '{{%idx-fanlar-ustozlar_id}}',
            '{{%fanlar}}'
        );

        $this->dropTable('{{%fanlar}}');
    }
}
