<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BerkasPegawaiSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="berkas-pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_berkas_pegawai') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'jenis_identitas') ?>

    <?= $form->field($model, 'no_identitas') ?>

    <?= $form->field($model, 'tanggal_akhir_valid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
