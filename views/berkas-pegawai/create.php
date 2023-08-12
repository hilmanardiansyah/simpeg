<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BerkasPegawai $model */

$this->title = 'Create Berkas Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Berkas Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berkas-pegawai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'pegawai' => $pegawai,
         'dataProvider' => $dataProvider
        
    ]) ?>

</div>
