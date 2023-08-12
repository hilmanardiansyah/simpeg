<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Pegawai;
use app\models\PegawaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Personal;

/**
 * PegawaiController implements the CRUD actions for Pegawai model.
 */
class PegawaiController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
    
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['update'],
                    'rules' => [
                        [
                            
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                
            ];
            
    }

    /**
     * Lists all Pegawai models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PegawaiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pegawai model.
     * @param int $id_pegawai Id Pegawai
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pegawai)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pegawai),
        ]);
    }

    /**
     * Creates a new Pegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pegawai();
        $namaPersonal = Personal:: getAllPersonal();
        
        if ($model->load(Yii::$app->request->post())) {
            $model ->tanggal_bergabung = \Yii::$app->formatter->asDate($model->tanggal_bergabung, 'yyyy-MM-dd');
            $model ->save();
            Yii::$app->session->setFlash('success', 'Data Berhasil Disimpan');
                return $this->redirect(['view', 'id_pegawai' => $model->id_pegawai]);
            } else {
                $model->loadDefaultValues();
            }
        

        return $this->render('create', [
            'model' => $model,
            'namaPersonal' => $namaPersonal
            
        ]);
    }

    /**
     * Updates an existing Pegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pegawai Id Pegawai
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pegawai)
    {
        $model = $this->findModel($id_pegawai);
        $namaPersonal = Personal:: getAllPersonal();
        $model->tanggal_bergabung = date('d-M-Y', strtotime($model->tanggal_bergabung));
       // if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            if ($model->load(Yii::$app->request->post())) {
            $model ->tanggal_bergabung = Yii::$app->formatter->asDate($model->tanggal_bergabung, 'yyyy-MM-dd');
            $model->save();
            return $this->redirect(['view', 'id_pegawai' => $model->id_pegawai]);
        }

        return $this->render('update', [
            'model' => $model,
            'namaPersonal' => $namaPersonal
        ]);
    }

    /**
     * Deletes an existing Pegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pegawai Id Pegawai
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pegawai)
    {
        $this->findModel($id_pegawai)->delete();
        Yii::$app->session->setFlash('danger', 'Data Berhasil Dihapus');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Pegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pegawai Id Pegawai
     * @return Pegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pegawai)
    {
        if (($model = Pegawai::findOne(['id_pegawai' => $id_pegawai])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
