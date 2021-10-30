<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kafedra_mudiri}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%kefedralar}}`
 */
class m211030_170310_create_kafedra_mudiri_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kafedra_mudiri}}', [
            'id' => $this->primaryKey(),
            'kafedra_id' => $this->integer(),
            'mudir_ismi' => $this->string(30)->notNull(),
            'mudir_familiyasi' => $this->string(50)->notNull(),
            'qabul_vaqti' => $this->string(30)->notNull(),
            'telefon' => $this->string(30)->notNull(),
            'email' => $this->string(50)->notNull(),
            'image' => $this->string()->notNull(),
        ]);

        // creates index for column `kefedra_id`
        $this->createIndex(
            '{{%idx-kafedra_mudiri-kafedra_id}}',
            '{{%kafedra_mudiri}}',
            'kafedra_id'
        );

        // add foreign key for table `{{%kefedralar}}`
        $this->addForeignKey(
            '{{%fk-kafedra_mudiri-kafedra_id}}',
            '{{%kafedra_mudiri}}',
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
        // drops foreign key for table `{{%kefedralar}}`
        $this->dropForeignKey(
            '{{%fk-kafedra_mudiri-kefedra_id}}',
            '{{%kafedra_mudiri}}'
        );

        // drops index for column `kefedra_id`
        $this->dropIndex(
            '{{%idx-kafedra_mudiri-kefedra_id}}',
            '{{%kafedra_mudiri}}'
        );

        $this->dropTable('{{%kafedra_mudiri}}');
    }
}
