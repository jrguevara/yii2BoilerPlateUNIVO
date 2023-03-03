<?php

namespace app\controllers;

use Yii;
use app\models\TblUsuarios;
use app\models\UsuarioSignup;
use app\models\UsuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UsuariosController implements the CRUD actions for TblUsuarios model.
 */
class UsuariosController extends Controller
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
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TblUsuarios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblUsuarios model.
     * @param int $id_usuario Id Usuario
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_usuario)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_usuario),
        ]);
    }

    /**
     * Creates a new TblUsuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UsuarioSignup();

        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'imagen');
            if (empty($image)) {
                $name = $this->request->baseUrl . '/avatars/default.png';
                $model->imagen = $name;
            } else {
                $tmp = explode(".", $image->name);
                $ext = end($tmp);
                $name = Yii::$app->security->generateRandomString() . ".{$ext}";
                $path = Yii::$app->basePath . '/web/avatars/' . $name;
                $path2 = Yii::$app->request->baseUrl . '/avatars/' . $name;
                $model->imagen = $path2;
                $image->saveAs($path);
            }
            if ($model->signup()) { {
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblUsuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_usuario Id Usuario
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_usuario)
    {
        $model = $this->findModel($id_usuario);

        //TODO: Remover required password hash de TblUsuario    
        $j = $model->password_hash;

        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'imagen');

            if (empty($image)) {
                $model->imagen = $_POST['TblUsuarios']['imagen'];
            } else {
                $tmp = explode(".", $image->name);
                $ext = end($tmp);
                $name = Yii::$app->security->generateRandomString() . ".{$ext}";
                $path = Yii::$app->basePath . '/web/avatars/' . $name;
                $path2 = Yii::$app->request->baseUrl . '/avatars/' . $name;;
                $model->imagen = $path2;
                $image->saveAs($path);
            }

            $i = $_POST['TblUsuarios']['password_hash'];
            if (empty($i)) {
                $model->password_hash = $j;
            } else {
                $new_password = Yii::$app->security->generatePasswordHash($i);
                $model->password_hash = $new_password;
            }

            $model->save();
            return $this->redirect(['view', 'id_usuario' => $model->id_usuario]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblUsuarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_usuario Id Usuario
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_usuario)
    {
        //$this->findModel($id_usuario)->delete();
        $model = $this->findModel($id_usuario);
        $model->status = 0;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblUsuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_usuario Id Usuario
     * @return TblUsuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_usuario)
    {
        if (($model = TblUsuarios::findOne(['id_usuario' => $id_usuario])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
