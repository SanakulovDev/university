<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%talabalar}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m211031_080046_add_user_id_column_to_talabalar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%talabalar}}', 'user_id', $this->integer());

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-talabalar-user_id}}',
            '{{%talabalar}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-talabalar-user_id}}',
            '{{%talabalar}}',
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
            '{{%fk-talabalar-user_id}}',
            '{{%talabalar}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-talabalar-user_id}}',
            '{{%talabalar}}'
        );

        $this->dropColumn('{{%talabalar}}', 'user_id');
    }
}
