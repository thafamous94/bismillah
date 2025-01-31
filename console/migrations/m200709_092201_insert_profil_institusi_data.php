<?php

use yii\db\Migration;

/**
 * Class m200709_092201_insert_profil_institusi_data
 */
class m200709_092201_insert_profil_institusi_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $data = [
            ['nama', 'UIN SUSKA RIAU', 0, 0],
            ['alamat', 'Jln. Pekanbaru-Bangkinang', 0, 0],
            ['telepon', '03291935', 0, 0]
        ];

        $this->batchInsert('{{%profil_institusi}}', ['nama', 'isi', 'created_at', 'updated_at'], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('{{%profil_institusi}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200709_092201_insert_profil_institusi_data cannot be reverted.\n";

        return false;
    }
    */
}
