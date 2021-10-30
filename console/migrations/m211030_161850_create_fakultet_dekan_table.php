<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%fakultet_dekan}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%Fakultetlar}}`
 */
class m211030_161850_create_fakultet_dekan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%fakultet_dekan}}', [
            'id' => $this->primaryKey(),
            'fakultet_id' => $this->integer(),
            'dekan_ismi' => $this->string()->notNull(),
            'dekan_familiyasi' => $this->string()->notNull(),
            'qabul_vaqti' => $this->string()->notNull(),
            'telefon' => $this->string(30),
            'email' => $this->string(100),
            'image' => $this->string(),
            'dekan_haqida' => $this->string(255),
        ]);

        // creates index for column `fakultet_id`
        $this->createIndex(
            '{{%idx-fakultet_dekan-fakultet_id}}',
            '{{%fakultet_dekan}}',
            'fakultet_id'
        );

        // add foreign key for table `{{%Fakultetlar}}`
        $this->addForeignKey(
            '{{%fk-fakultet_dekan-fakultet_id}}',
            '{{%fakultet_dekan}}',
            'fakultet_id',
            '{{%Fakultetlar}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%Fakultetlar}}`
        $this->dropForeignKey(
            '{{%fk-fakultet_dekan-fakultet_id}}',
            '{{%fakultet_dekan}}'
        );

        // drops index for column `fakultet_id`
        $this->dropIndex(
            '{{%idx-fakultet_dekan-fakultet_id}}',
            '{{%fakultet_dekan}}'
        );

        $this->dropTable('{{%fakultet_dekan}}');
    }
}
