<?php

use app\models\Personal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PersonalSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Personal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Personal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'header' => 'Nama Lengkap',
                // 'headerOptions' => ['style'=> 'width:200px', 'class'=>'text-center'],
                'value' => function($model){
                    return $model->nama_lengkap;
                }
            ],
            [
                'header'=> 'Jenis Kelamin',
                'value' => function($model){
                    return $model->jenis_kelamin;
                }
            ],
            [
                'header' => 'Tempat Lahir',
                'value' => function($model){
                    return $model->tempat_lahir;
                }

            ],
            [
                'header' => 'Tanggal lahir ',
                'value' => function($model){
                    return date("d-M-Y", strtotime($model->tanggal_lahir));
                }
            ],
            [
                'header' => 'Alamat',
                'value' => function($model){
                    return $model->alamat;
                }

            ],
            [
                'header' => 'No KTP',
                'value' => function($model){
                    return $model->no_ktp;
                }

            ],
            [
                'header' => 'No HP',
                'value' => function($model){
                    return $model->no_hp;
                }

            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Personal $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_personal' => $model->id_personal]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
