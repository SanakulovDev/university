<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%fakultet_guruhlari}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%fakultetlar}}`
 */
class m211030_170759_create_fakultet_guruhlari_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%fakultet_guruhlari}}', [
            'id' => $this->primaryKey(),
            'fakultet_id' => $this->integer(),
            'guruh_raqami' => $this->string(15)->notNull(),
        ]);

        // creates index for column `fakultet_id`
        $this->createIndex(
            '{{%idx-fakultet_guruhlari-fakultet_id}}',
            '{{%fakultet_guruhlari}}',
            'fakultet_id'
        );

        // add foreign key for table `{{%fakultetlar}}`
        $this->addForeignKey(
            '{{%fk-fakultet_guruhlari-fakultet_id}}',
            '{{%fakultet_guruhlari}}',
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
            '{{%fk-fakultet_guruhlari-fakultet_id}}',
            '{{%fakultet_guruhlari}}'
        );

        // drops index for column `fakultet_id`
        $this->dropIndex(
            '{{%idx-fakultet_guruhlari-fakultet_id}}',
            '{{%fakultet_guruhlari}}'
        );

        $this->dropTable('{{%fakultet_guruhlari}}');
    }
}
