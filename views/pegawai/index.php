<?php

use app\models\Pegawai;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PegawaiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          

           // 'personal.nama_lengkap',
           [
            'attribute' => 'nama_pegawai',
            'value' => function($model){
                return $model->personal->nama_lengkap;
            }
           ],
            [
                'attribute' => 'personal.jenis_kelamin',
                'headerOptions' => ['style' => 'width:140px'],
                'filter' => Html::activeDropDownList($searchModel, 'jenis_kelamin', \app\models\Personal::JENIS_KELAMIN,['class' => 'form-control', 'prompt' => 'Pilih'])
            ],
            // [
            //     'attribute' => 'alamat',
            //     'headerOptions' => ['style' =>'width:150px'],
            //     'value' => function($model){
            //         return $model->personal->alamat;
            //     }
            // ], 

            [
                'label' => 'Nomor KTP',
                'value' => function($model){
                    return $model->personal->no_ktp;
                }
            ],
            [
                
                'attribute' => 'jenis_pegawai',
                'headerOptions' => ['style' => 'width:140px'],
                'filter' => Html::activeDropDownList($searchModel, 'jenis_pegawai',\app\models\Pegawai::JENIS_PEGAWAI,['class' => 'form-control', 'prompt' => 'Pilih'])
            ],
            'attribute' => 'status_pegawai',
            
            'jabatan',
            'tanggal_bergabung',
            'gaji',
            [
                 'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pegawai $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_pegawai' => $model->id_pegawai]);
                 }
                 
            ],
            [
             
                
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => 'width:65px'],
                'template' => '{berkas} ',
                'buttons' => [
                    // 'view'=> function($url, $model){
                    //     $url = Yii::$app->urlManager->createUrl(['pegawai/view','id' => $model->id_pegawai]);
                    //     return Html::a('<i class="glyphicon glyphicon-$iconname"</i>',$url,['title'=>'View']);
                    // },
                    // 'update'=> function($url, $model){
                    //     $url = Yii::$app->urlManager->createUrl(['pegawai/update','id' => $model->id_pegawai]);
                    //     return Html::a('<i class="glyphicon glyphicon-fas fa-user "</i>',$url,['title'=>'Update']);
                    // },
                    'berkas'=> function($url, $model){
                        $url = Yii::$app->urlManager->createUrl(['berkas-pegawai/create','id' => $model->id_pegawai]);
                        return Html::a('<i class="glyphicon glyphicon-fas fa-user "</i>',$url,['title'=>'Add File']);
                    },
                    // 'delete' => function($url, $model){
                    //     $url = Yii::$app->urlManager->createUrl(['pegawai/delete','id' => $model->id_pegawai]);
                    //     return Html::a('<i class="glyphicon glyphicon-fas fa-user"</i>',$url,['title'=>'Update',
                    //     'data-confirm'=> Yii::t('yii','Apakah yakin untuk menghapus data ini?'),
                    //     'data-method '=> 'post',
                    // ]);
                    // }
                ]
            ]
            ]
    ]); ?>

    <?php Pjax::end(); ?>

</div>
