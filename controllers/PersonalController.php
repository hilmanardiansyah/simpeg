<?php

namespace app\controllers;
use Yii;
use app\models\Personal;
use app\models\Pegawai;
use app\models\PersonalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * PersonalController implements the CRUD actions for Personal model.
 */
class PersonalController extends Controller
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
     * Lists all Personal models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PersonalSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        // $dataProvider->query->where(['jenis_kelamin' => 'Laki-laki']);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personal model.
     * @param int $id_personal Id Personal
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_personal)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_personal),
        ]);
    }

    /**
     * Creates a new Personal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Personal();
        $modelPegawai = new Pegawai();
        $statusPerkawinan = Personal::STATUS_PERKAWINAN;
        $agama = Personal::AGAMA;
        $pendidikan = Personal::PENDIDIKAN;
        $model2 = new Pegawai();

        // if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $modelPegawai->load(Yii::$app->request->post())) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    $model->tanggal_lahir = \Yii::$app->formatter->asDate($model->tanggal_lahir, 'yyyy-MM-dd');
                    if(!$model->save()){
                        throw new \Exception('Gagal Menyimpan Personal Mampus :' .json_encode($model->getErrors()));
                    };

                    $modelPegawai->id_personal = $model->id_personal;
                    $modelPegawai->tanggal_bergabung = \Yii::$app->formatter->asDate($modelPegawai->tanggal_bergabung, 'yyyy-MM-dd');
                    if(!$modelPegawai->save()){
                        throw new \Exception('Gagal Menyimpan Pegawai Mampus :' .json_encode($modelPegawai->getErrors()));
                    };

                    $transaction->commit();
                    Yii::$app->session->setFlash('success', 'Data Berhasil Disimpan');
                    return $this->redirect(['view', 'id_personal' => $model->id_personal]);
                } catch (\Exception $e) {
                    $transaction->rollBack();
                    echo '<pre>';
                    print_r($e->getMessage());
                    exit;
                    Yii::$app->session->setFlash('error', 'Data Gagal Disimpan');
                    return $this->redirect(Yii::$app->request->referrer);
                   // throw $e;
                }

                
            }
        
        // } else {
        //     $model->loadDefaultValues();
        // }

        return $this->render('create', [
            'model' => $model,
            'statusPerkawinan' => $statusPerkawinan,
            'agama' => $agama,
            'pendidikan' => $pendidikan,
            'modelPegawai' => $modelPegawai
        ]);
    }

    /**
     * Updates an existing Personal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_personal Id Personal
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_personal)
    {
        $model = $this->findModel($id_personal);
        $statusPerkawinan = Personal::STATUS_PERKAWINAN;
        $agama = Personal::AGAMA;
        $pendidikan = Personal::PENDIDIKAN;
        $modelPegawai = new Pegawai;
       
        $model->tanggal_lahir = date('d-M-Y', strtotime($model->tanggal_lahir));
        if ($model->load($this->request->post())  && $modelPegawai->load(Yii::$app->request->post())) {
            $model->tanggal_lahir = \Yii::$app->formatter->asDate($model->tanggal_lahir, 'yyyy-MM-dd');
         $model->save();
         $modelPegawai->id_personal = $model->id_personal;
         $modelPegawai->tanggal_bergabung = \Yii::$app->formatter->asDate($modelPegawai->tanggal_bergabung, 'yyyy-MM-dd');
            return $this->redirect(['view', 'id_personal' => $model->id_personal]);
        }
        return $this->render('update', [
            'model' => $model,
            'statusPerkawinan' => $statusPerkawinan,
            'agama' => $agama,
            'pendidikan' => $pendidikan,
            'modelPegawai' => $modelPegawai
            
        ]);
    }

    /**
     * Deletes an existing Personal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_personal Id Personal
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_personal)
    {
        $this->findModel($id_personal)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Personal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_personal Id Personal
     * @return Personal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_personal)
    {
        if (($model = Personal::findOne(['id_personal' => $id_personal])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
