<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BerkasPegawai;

/**
 * BerkasPegawaiSearch represents the model behind the search form of `app\models\BerkasPegawai`.
 */
class BerkasPegawaiSearch extends BerkasPegawai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_berkas_pegawai', 'id_pegawai'], 'integer'],
            [['jenis_identitas', 'no_identitas', 'tanggal_akhir_valid'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BerkasPegawai::find();

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
            'id_berkas_pegawai' => $this->id_berkas_pegawai,
            'id_pegawai' => $this->id_pegawai,
            'tanggal_akhir_valid' => $this->tanggal_akhir_valid,
        ]);

        $query->andFilterWhere(['like', 'jenis_identitas', $this->jenis_identitas])
            ->andFilterWhere(['like', 'no_identitas', $this->no_identitas]);

        return $dataProvider;
    }
}
