<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $id_pegawai
 * @property int $id_personal
 * @property string $jenis_pegawai
 * @property string $status_pegawai
 * @property string $jabatan
 * @property string $tanggal_bergabung
 * @property int $gaji
 *
 * @property Personal $personal
 */
class Pegawai extends \yii\db\ActiveRecord
{
    const JENIS_PEGAWAI =  ['Medis' => 'Medis','Non Medis' => 'Non Medis'];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_personal', 'jenis_pegawai', 'status_pegawai', 'jabatan', 'tanggal_bergabung', 'gaji'], 'required'],
            [['id_personal', 'gaji'], 'integer'],
            [['tanggal_bergabung'], 'safe'],
            [['jenis_pegawai', 'status_pegawai', 'jabatan'], 'string', 'max' => 120],
            [['id_personal'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::class, 'targetAttribute' => ['id_personal' => 'id_personal']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pegawai' => 'Id Pegawai',
            'id_personal' => 'Id Personal',
            'jenis_pegawai' => 'Jenis Pegawai',
            'status_pegawai' => 'Status Pegawai',
            'jabatan' => 'Jabatan',
            'tanggal_bergabung' => 'Tanggal Bergabung',
            'gaji' => 'Gaji',
        ];
    }

    /**
     * Gets query for [[Personal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonal()
    {
        return $this->hasOne(Personal::class, ['id_personal' => 'id_personal']);
    }


}
