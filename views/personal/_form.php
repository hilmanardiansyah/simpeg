<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\Personal $model */
/** @var yii\widgets\ActiveForm $form */
?>
    <div id ="content">
    <div class="x_content" style="display: block;">
                        <div class="card shadow mb-4">
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Identitas Personal</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <?php $form = ActiveForm::begin(); ?>

                            <div class ="row">
                            <div class="col-md-4">
                            <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-2">
                            <?= $form->field($model, 'nama_panggilan')->textInput(['maxlength' => true]) ?>
                            </div>  
                            <div class="col-md-3">
                             <label>Jenis Kelamin</label> 
										 <p>
											Laki-Laki:
											<input type="radio" class="flat" name="Personal[jenis_kelamin]" id="jenis_kelamin" value="Laki-laki" checked="" required /> 
											<input type="radio" class="flat" name="Personal[jenis_kelamin]" id="jenis_kelamin" value="Perempuan" />
                                            Perempuan
										</p> 
                                        <!-- <?= $form->field($model, 'jenis_kelamin')->radioList(['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'],[
                                'item' => function($index, $label, $name, $checked, $value){
                               return '<label style="margin-right:30px;"><input type="radio" class="flat" name="'.$name.'" value"'.$value.'"'.
                               ( $checked ? "checked" : "").'> '.$label.'</label>';
                            }   
                            ])?>
     -->
                           
                            </div>  
                            <div class="col-md-3">
                            <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
                            </div>  
                            </div>

                            <div class ="row">
                            <div class="col-md-3">
                            <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::classname(), [
                                'options' => ['placeholder' => 'Pilih Tanggal ...'],
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'dd-M-yyyy'
                                ]
                            ]);?>
                            </div>
                            <div class="col-md-3">
                            <?= $form->field($model, 'status_perkawinan')->widget(Select2::classname(), [
                                'data' => $statusPerkawinan,
                                'options' => ['placeholder' => 'Pilih  Status Perkawinan...'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                            
                             ?>
                            </div>  
                            <div class="col-md-3">
                            <?= $form->field($model, 'agama')->widget(Select2::classname(), [
                                'data' => $agama,
                                'options' => ['placeholder' => 'Pilih Agama ...'],
                                'pluginOptions' => [
                                'allowClear' => true
                                ],
                            ]);
                            ?>
                            </div> 
                            <div class="col-md-3">
                            <?= $form->field($model, 'pendidikan')->widget(Select2::classname(), [
                                'data' => $pendidikan,
                                'options' => ['placeholder' => 'Pilih Pendidikan ...'],
                                'pluginOptions' => [
                                'allowClear' => true
                                ],
                            ]);
                            ?>
                            </div>  
                            </div>

                            <div class ="row">
                            <div class="col-md-3">
                            <?= $form->field($model, 'alamat')->textArea(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-3">
                            <?= $form->field($model, 'no_ktp')->textInput(['maxlength' => true]) ?>
                            </div>  
                            <div class="col-md-3">
                            <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>
                            </div>  
                            <div class="col-md-3">
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                            </div>  
                            </div>
                            
                            <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
                        </div>
                        <div class="card-body">
                            <!-- <div class="table-responsive"> -->
                           
                            <div class ="row">
                            <div class="col-md-4">
                            <?= $form->field($modelPegawai, 'jenis_pegawai')->widget(Select2::classname(), [
                                'data' => \app\models\Pegawai::JENIS_PEGAWAI,
                                'options' => ['placeholder' => 'Pilih  Jenis Pegawai...'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);?>
                            </div>

                          <div class="col-md-4">
                            <?= $form->field($modelPegawai, 'status_pegawai')->widget(Select2::classname(), [
                                'data' => ['Belum Menikah' => 'Pegawai Tetap', 'Pegawai Kontrak'=> 'Pegawai Kontrak'],
                                'options' => ['placeholder' => 'Pilih  Status Pegawai...'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);?>
                            </div>
                            <div class="col-md-4">
                            <?= $form->field($modelPegawai, 'jabatan')->textInput() ?>
                            </div>

                            <div class="col-md-4">
                            <?= $form->field($modelPegawai, 'tanggal_bergabung')->widget(DatePicker::classname(), [
                                'options' => ['placeholder' => 'Pilih Tanggal ...'],
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'dd-M-yyyy'
                                ]
                            ]);?>
                            </div>
                            <div class="col-md-4">
                            <?= $form->field($modelPegawai, 'gaji')->textInput(['type' => 'number']) ?>
                            </div>
                            </div>

                            </div>

                        </div>
                       
                    </div>


                    <!-- ajwfkjabfjhawbfa -->
                   
                    
                       
                        <!-- </div> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
                        
</div>
