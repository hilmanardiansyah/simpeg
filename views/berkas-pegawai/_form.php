<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use kartik\file\FileInput;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BerkasPegawai $model */
/** @var yii\widgets\ActiveForm $form */
?>

<!-- <div class="berkas-pegawai-form"> -->
                        <div class="card shadow mb-8">
                        <div class="card-header py-3">
                            <h6 class="m-13 font-weight-bold text-primary">Tambah Berkas Pegawai======================================List Berkas Pegawai</h6>
                            
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-6">
                            <div class="card-body">
                            <div class="table-responsive">
                             <?php $form = ActiveForm::begin(); ?>
                             <div class ="row">
                            <div class="col-md-4">
                                <?= $form->field($pegawai, 'id_pegawai')->textInput(['value' => $pegawai->personal->nama_lengkap]) ?>
                            </div>

                              <div class="col-md-4">
                              <?= $form->field($model, 'jenis_identitas')->widget(Select2::classname(), [
                                'data' => ['KTP' => 'KTP', 'KK'=> 'KK', 'STR' => 'STR', 'SIK' => 'SIK', 'STR' => 'STR',
                                'SIK' => 'SIK', 'BPJS KESEHATAN' => 'BPJS KESEHATAN', 'BPJS KETENAGAKERJAAN' =>'BPJS KETENAGAKERJAAN', 'NPWP' => 'NPWP', 'SIPA' => 'SIPA', 'SIM' => 'SIM', 'SIP' => 'SIP',
                                'PASSPORT' => 'PASSPORT', 'LAIN-LAIN' => 'LAIN-LAIN' ],
                                'options' => ['placeholder' => 'Pilih  Status Pegawai...'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);?>
                            </div>
                           
                                <div class="col-md-4">
                              <?= $form->field($model, 'no_identitas')->textInput(['maxlength' => true]) ?>
                              </div>
                               <div class="col-md-4">
                            <?= $form->field($model, 'tanggal_akhir_valid')->widget(DatePicker::classname(), [
                                'options' => ['placeholder' => 'Pilih Tanggal Bergabung ...'],
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'dd-M-yyyy'
                                ]
                            ]);?>
                            </div>
                            <div class="col-md-8">
                                 <?= $form->field($model, 'file_berkas')->widget(FileInput::classname(), [
                                        'options' => ['accept' => 'image/*', 'pdf/*'],
                                        'pluginOptions' => [
                                            'showUpload' => false,
                                            'allowedFileExtension' => ['jpeg', 'jpg', 'png', 'pdf'],
                                        ]
                                    ]);?>
                                 </div>
                             
                        </div>
                     </div>
             </div>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

                            </div>
                            <div class="col-md-6">
                            <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'tableOptions' => ['class' => 'table m-table', 'style' => 'font-size:11px'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id_berkas_pegawai',
                            'id_pegawai',
                            'jenis_identitas',
                            'no_identitas',
                            'tanggal_akhir_valid',
                            'file_berkas',
                            // [
                            //    'header' => 'Aksi',
                            //    'class' => 'yii\grid\ActionColumn',
                            //  'headerOptions' => ['style' => 'width:80px'],
                            //    'template' => '{delete}',
                            //    'delete'=> function($url, $model){
                            //     $url = Yii::$app->urlManager->createUrl(['berkas-pegawai/delete','id' => $model->id_pegawai]);
                            //     return Html::a('<i class="glyphicon glyphicon-trash "</i>',$url,['title'=>'Delete',
                            //       'data-confirm ' =>Yii::t('yii', 'Apakah yakin ingin menghapus dta ini?'),
                            //       'data-method' => 'post',
                            
                            //     ]);
                            // },
                                //   [ 'class' => 'yii\grid\ActionColumn'],
                                // }
                            ],
                        ],
                    ); ?>
                        </div>
                     
                     
    </div>