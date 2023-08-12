<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\Pegawai $model */
/** @var yii\widgets\ActiveForm $form */
?>

                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <?php $form = ActiveForm::begin(); ?>
                            <div class ="row">
                            <div class="col-md-4">
                            <?= $form->field($model, 'id_personal')->widget(Select2::classname(), [
                                'data' => $namaPersonal,
                                'options' => ['placeholder' => 'Pilih Nama Lengkap...'],
                                // 'theme' => Select2::THEME_BOOTSRAP,
                                'pluginOptions' => [
                                'allowClear' => true
                                ],
                            ])->label('Nama Lengkap');
                            ?>
                            </div>

                            <div class="col-md-4">
                            <?= $form->field($model, 'jenis_pegawai')->widget(Select2::classname(), [
                                'data' => \app\models\Pegawai::JENIS_PEGAWAI,
                                'options' => ['placeholder' => 'Pilih  Jenis Pegawai...'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);?>
                            </div>

                          <div class="col-md-4">
                            <?= $form->field($model, 'status_pegawai')->widget(Select2::classname(), [
                                'data' => ['Pegawai Tetap' => 'Pegawai Tetap', 'Pegawai Kontrak'=> 'Pegawai Kontrak'],
                                'options' => ['placeholder' => 'Pilih  Status Pegawai...'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);?>
                            </div>
                            <div class="col-md-4">
                            <?= $form->field($model, 'jabatan')->textInput() ?>
                            </div>

                            <div class="col-md-4">
                            <?= $form->field($model, 'tanggal_bergabung')->widget(DatePicker::classname(), [
                                'options' => ['placeholder' => 'Pilih Tanggal ...'],
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'dd-M-yyyy'
                                ]
                            ]);?>
                            </div>
                            <div class="col-md-4">
                            <?= $form->field($model, 'gaji')->textInput(['type' => 'number']) ?>
                            </div>
                            </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
                        </div>
                        </div>              
</div>
