<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%fakultet_dekan_movin}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%fakultetlar}}`
 * - `{{%fakultet_dekan}}`
 */
class m211030_162514_create_fakultet_dekan_movin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%fakultet_dekan_movin}}', [
            'id' => $this->primaryKey(),
            'fakultet_id' => $this->integer(),
            'dekan_id' => $this->integer(),
            'muovin_ismi' => $this->string()->notNull(),
            'muovin_familiyasi' => $this->string()->notNull(),
            'qabul_vaqti' => $this->string()->notNull(),
            'telefon' => $this->string(30),
            'email' => $this->string(100),
            'image' => $this->string(),
            'dekan_haqida' => $this->string(255),
        ]);

        // creates index for column `fakultet_id`
        $this->createIndex(
            '{{%idx-fakultet_dekan_movin-fakultet_id}}',
            '{{%fakultet_dekan_movin}}',
            'fakultet_id'
        );

        // add foreign key for table `{{%fakultetlar}}`
        $this->addForeignKey(
            '{{%fk-fakultet_dekan_movin-fakultet_id}}',
            '{{%fakultet_dekan_movin}}',
            'fakultet_id',
            '{{%fakultetlar}}',
            'id',
            'CASCADE'
        );

        // creates index for column `dekan_id`
        $this->createIndex(
            '{{%idx-fakultet_dekan_movin-dekan_id}}',
            '{{%fakultet_dekan_movin}}',
            'dekan_id'
        );

        // add foreign key for table `{{%fakultet_dekan}}`
        $this->addForeignKey(
            '{{%fk-fakultet_dekan_movin-dekan_id}}',
            '{{%fakultet_dekan_movin}}',
            'dekan_id',
            '{{%fakultet_dekan}}',
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
            '{{%fk-fakultet_dekan_movin-fakultet_id}}',
            '{{%fakultet_dekan_movin}}'
        );

        // drops index for column `fakultet_id`
        $this->dropIndex(
            '{{%idx-fakultet_dekan_movin-fakultet_id}}',
            '{{%fakultet_dekan_movin}}'
        );

        // drops foreign key for table `{{%fakultet_dekan}}`
        $this->dropForeignKey(
            '{{%fk-fakultet_dekan_movin-dekan_id}}',
            '{{%fakultet_dekan_movin}}'
        );

        // drops index for column `dekan_id`
        $this->dropIndex(
            '{{%idx-fakultet_dekan_movin-dekan_id}}',
            '{{%fakultet_dekan_movin}}'
        );

        $this->dropTable('{{%fakultet_dekan_movin}}');
    }
}
