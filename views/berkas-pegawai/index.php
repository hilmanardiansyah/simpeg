<?php

use app\models\BerkasPegawai;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\BerkasPegawaiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Berkas Pegawais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berkas-pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Berkas Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_berkas_pegawai',
            'id_pegawai',
            'jenis_identitas',
            'no_identitas',
            'tanggal_akhir_valid',
            'file_berkas',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BerkasPegawai $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_berkas_pegawai' => $model->id_berkas_pegawai]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
