<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%berkas_pegawai}}`.
 */
class m230811_163215_add_file_berkas_column_to_berkas_pegawai_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%berkas_pegawai}}', 'file_berkas', $this->string(64)->after('tanggal_akhir_valid'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%berkas_pegawai}}', 'file_berkas');
    }
}
