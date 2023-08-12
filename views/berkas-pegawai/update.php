<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BerkasPegawai $model */

$this->title = 'Update Berkas Pegawai: ' . $model->id_berkas_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'Berkas Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_berkas_pegawai, 'url' => ['view', 'id_berkas_pegawai' => $model->id_berkas_pegawai]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="berkas-pegawai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
