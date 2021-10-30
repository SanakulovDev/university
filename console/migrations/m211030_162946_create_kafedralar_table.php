<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kafedralar}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%fakultetlar}}`
 */
class m211030_162946_create_kafedralar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kafedralar}}', [
            'id' => $this->primaryKey(),
            'kafedra_nomi' => $this->string(100),
            'fakultet_id' => $this->integer(),
            'fakultet_haqida' => $this->string()->notNull(),
        ]);

        // creates index for column `fakultet_id`
        $this->createIndex(
            '{{%idx-kafedralar-fakultet_id}}',
            '{{%kafedralar}}',
            'fakultet_id'
        );

        // add foreign key for table `{{%fakultetlar}}`
        $this->addForeignKey(
            '{{%fk-kafedralar-fakultet_id}}',
            '{{%kafedralar}}',
            'fakultet_id',
            '{{%fakultetlar}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%fakultetlar}}`
        $this->dropForeignKey(
            '{{%fk-kafedralar-fakultet_id}}',
            '{{%kafedralar}}'
        );

        // drops index for column `fakultet_id`
        $this->dropIndex(
            '{{%idx-kafedralar-fakultet_id}}',
            '{{%kafedralar}}'
        );

        $this->dropTable('{{%kafedralar}}');
    }
}
