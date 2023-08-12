<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "berkas_pegawai".
 *
 * @property int $id_berkas_pegawai
 * @property int $id_pegawai
 * @property string $jenis_identitas
 * @property string $no_identitas
 * @property string|null $tanggal_akhir_valid
 *
 * @property Pegawai $pegawai
 */
class BerkasPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'berkas_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'jenis_identitas', 'no_identitas'], 'required'],
            [['id_pegawai'], 'integer'],
            [['tanggal_akhir_valid'], 'safe'],
            [['jenis_identitas'], 'string', 'max' => 30],
            [['no_identitas'], 'string', 'max' => 50],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::class, 'targetAttribute' => ['id_pegawai' => 'id_pegawai']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_berkas_pegawai' => 'Id Berkas Pegawai',
            'id_pegawai' => 'Id Pegawai',
            'jenis_identitas' => 'Jenis Identitas',
            'no_identitas' => 'No Identitas',
            'tanggal_akhir_valid' => 'Tanggal Akhir Valid',
        ];
    }

    /**
     * Gets query for [[Pegawai]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(Pegawai::class, ['id_pegawai' => 'id_pegawai']);
    }
}
