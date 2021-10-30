<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%talabalar}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%fakultetlar}}`
 * - `{{%fakultet_guruhlari}}`
 */
class m211030_172233_create_talabalar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%talabalar}}', [
            'id' => $this->primaryKey(),
            'fakultet_id' => $this->integer(),
            'guruh_id' => $this->integer(),
            'talaba_ismi' => $this->string(50)->notNull(),
            'talaba_familiyasi' => $this->string(100)->notNull(),
            'talaba_otasining_ismi' => $this->string(70)->notNull(),
            'telefon' => $this->string(30)->notNull(),
            'image' => $this->string()->notNull(),
        ]);

        // creates index for column `fakultet_id`
        $this->createIndex(
            '{{%idx-talabalar-fakultet_id}}',
            '{{%talabalar}}',
            'fakultet_id'
        );

        // add foreign key for table `{{%fakultetlar}}`
        $this->addForeignKey(
            '{{%fk-talabalar-fakultet_id}}',
            '{{%talabalar}}',
            'fakultet_id',
            '{{%fakultetlar}}',
            'id',
            'CASCADE'
        );

        // creates index for column `guruh_id`
        $this->createIndex(
            '{{%idx-talabalar-guruh_id}}',
            '{{%talabalar}}',
            'guruh_id'
        );

        // add foreign key for table `{{%fakultet_guruhlari}}`
        $this->addForeignKey(
            '{{%fk-talabalar-guruh_id}}',
            '{{%talabalar}}',
            'guruh_id',
            '{{%fakultet_guruhlari}}',
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
            '{{%fk-talabalar-fakultet_id}}',
            '{{%talabalar}}'
        );

        // drops index for column `fakultet_id`
        $this->dropIndex(
            '{{%idx-talabalar-fakultet_id}}',
            '{{%talabalar}}'
        );

        // drops foreign key for table `{{%fakultet_guruhlari}}`
        $this->dropForeignKey(
            '{{%fk-talabalar-guruh_id}}',
            '{{%talabalar}}'
        );

        // drops index for column `guruh_id`
        $this->dropIndex(
            '{{%idx-talabalar-guruh_id}}',
            '{{%talabalar}}'
        );

        $this->dropTable('{{%talabalar}}');
    }
}
