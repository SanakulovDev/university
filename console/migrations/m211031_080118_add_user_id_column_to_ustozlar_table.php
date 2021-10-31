<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%ustozlar}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m211031_080118_add_user_id_column_to_ustozlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%ustozlar}}', 'user_id', $this->integer());

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-ustozlar-user_id}}',
            '{{%ustozlar}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-ustozlar-user_id}}',
            '{{%ustozlar}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-ustozlar-user_id}}',
            '{{%ustozlar}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-ustozlar-user_id}}',
            '{{%ustozlar}}'
        );

        $this->dropColumn('{{%ustozlar}}', 'user_id');
    }
}
