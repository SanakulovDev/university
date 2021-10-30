<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%talabalar}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%uqish_turi}}`
 * - `{{%talaba_turi}}`
 */
class m211030_173419_add_uqish_turi_id_column_talaba_turi_id_column_to_talabalar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%talabalar}}', 'uqish_turi_id', $this->integer());
        $this->addColumn('{{%talabalar}}', 'talaba_turi_id', $this->integer());

        // creates index for column `uqish_turi_id`
        $this->createIndex(
            '{{%idx-talabalar-uqish_turi_id}}',
            '{{%talabalar}}',
            'uqish_turi_id'
        );

        // add foreign key for table `{{%uqish_turi}}`
        $this->addForeignKey(
            '{{%fk-talabalar-uqish_turi_id}}',
            '{{%talabalar}}',
            'uqish_turi_id',
            '{{%uqish_turi}}',
            'id',
            'CASCADE'
        );

        // creates index for column `talaba_turi_id`
        $this->createIndex(
            '{{%idx-talabalar-talaba_turi_id}}',
            '{{%talabalar}}',
            'talaba_turi_id'
        );

        // add foreign key for table `{{%talaba_turi}}`
        $this->addForeignKey(
            '{{%fk-talabalar-talaba_turi_id}}',
            '{{%talabalar}}',
            'talaba_turi_id',
            '{{%talaba_turi}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%uqish_turi}}`
        $this->dropForeignKey(
            '{{%fk-talabalar-uqish_turi_id}}',
            '{{%talabalar}}'
        );

        // drops index for column `uqish_turi_id`
        $this->dropIndex(
            '{{%idx-talabalar-uqish_turi_id}}',
            '{{%talabalar}}'
        );

        // drops foreign key for table `{{%talaba_turi}}`
        $this->dropForeignKey(
            '{{%fk-talabalar-talaba_turi_id}}',
            '{{%talabalar}}'
        );

        // drops index for column `talaba_turi_id`
        $this->dropIndex(
            '{{%idx-talabalar-talaba_turi_id}}',
            '{{%talabalar}}'
        );

        $this->dropColumn('{{%talabalar}}', 'uqish_turi_id');
        $this->dropColumn('{{%talabalar}}', 'talaba_turi_id');
    }
}
