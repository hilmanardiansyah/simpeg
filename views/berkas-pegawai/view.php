<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\BerkasPegawai $model */

$this->title = $model->id_berkas_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'Berkas Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="berkas-pegawai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_berkas_pegawai' => $model->id_berkas_pegawai], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_berkas_pegawai' => $model->id_berkas_pegawai], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_berkas_pegawai',
            'id_pegawai',
            'jenis_identitas',
            'no_identitas',
            'tanggal_akhir_valid',
        ],
    ]) ?>

</div>
