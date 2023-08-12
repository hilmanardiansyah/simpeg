<?php

namespace app\controllers;
use Yii;
use app\models\BerkasPegawai;
use app\models\Pegawai;
use app\models\BerkasPegawaiSearch;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BerkasPegawaiController implements the CRUD actions for BerkasPegawai model.
 */
class BerkasPegawaiController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all BerkasPegawai models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BerkasPegawaiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BerkasPegawai model.
     * @param int $id_berkas_pegawai Id Berkas Pegawai
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_berkas_pegawai)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_berkas_pegawai),
        ]);
    }

    /**
     * Creates a new BerkasPegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
      $pegawai = Pegawai::findOne($id);
        $model = new BerkasPegawai();
        
       
        // if ($this->request->isPost) {
            if ($model->load($this->request->post()) ) {
                if(!empty($_FILES['BerkasPegawai']['name']['file_berkas'])){
                    $file = UploadedFile::getInstance($model, 'file_berkas');
                    $berkas = $model->jenis_identitas.'-'.$id.'.'.$file->getExtension();
                    $model->file_berkas = $berkas;

                    $path = 'uploads/berkas_pegawai/';
                    if(!file_exists($path)){
                        FileHelper::createDirectory($path);
                    }
                    $file->saveAs($path.$berkas);

                }
                $model->id_pegawai =$pegawai->id_pegawai;
                 $model->tanggal_akhir_valid = date('Y-m-d', strtotime($model->tanggal_akhir_valid));
                $model->save();
                return $this->redirect(Yii::$app->request->referrer);
            }
            //buat grid data
            $searchModel = new BerkasPegawaiSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
            $dataProvider->query->andWhere(['id_pegawai' => $id]);
    
        // } else {
        //     $model->loadDefaultValues();
        // }

        return $this->render('create', [
            'model' => $model,
            'pegawai' => $pegawai,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Updates an existing BerkasPegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_berkas_pegawai Id Berkas Pegawai
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
     public function actionUpdate($id_berkas_pegawai)
    {
        $model = $this->findModel($id_berkas_pegawai);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_berkas_pegawai' => $model->id_berkas_pegawai]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BerkasPegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_berkas_pegawai Id Berkas Pegawai
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_berkas_pegawai)
    {
        $this->findModel($id_berkas_pegawai)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BerkasPegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_berkas_pegawai Id Berkas Pegawai
     * @return BerkasPegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_berkas_pegawai)
    {
        if (($model = BerkasPegawai::findOne(['id_berkas_pegawai' => $id_berkas_pegawai])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
