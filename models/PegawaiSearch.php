<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pegawai;

/**
 * PegawaiSearch represents the model behind the search form of `app\models\Pegawai`.
 */
class PegawaiSearch extends Pegawai
{

    public $nama_pegawai;
    public $alamat;
    public $jenis_kelamin;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'id_personal', 'gaji'], 'integer'],
            [['jenis_pegawai', 'status_pegawai', 'jabatan', 'tanggal_bergabung', 'nama_pegawai','alamat','jenis_kelamin'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    // public function scenarios()
    // {
    //     // bypass scenarios() implementation in the parent class
    //     return Model::scenarios();
    // }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pegawai::find();
        $query->leftJoin('personal', 'pegawai.id_personal = personal.id_personal');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pegawai' => $this->id_pegawai,
            'id_personal' => $this->id_personal,
            'tanggal_bergabung' => $this->tanggal_bergabung,
            'gaji' => $this->gaji,
        ]);

        $query->andFilterWhere(['=', 'jenis_pegawai', $this->jenis_pegawai])
            ->andFilterWhere(['like', 'status_pegawai', $this->status_pegawai])
            ->andFilterWhere(['like', 'jabatan', $this->jabatan])
            ->andFilterWhere(['like', 'personal.nama_lengkap', $this->nama_pegawai])
            ->andFilterWhere(['like', 'personal.alamat', $this->alamat])
            ->andFilterWhere(['=', 'personal.jenis_kelamin', $this->jenis_kelamin]);

        return $dataProvider;
    }
}
