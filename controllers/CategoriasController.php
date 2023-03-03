<?php

namespace app\controllers;

use Yii;
use app\models\TblCategorias;
use app\models\CategoriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoriasController implements the CRUD actions for TblCategorias model.
 */
class CategoriasController extends Controller
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
     * Lists all TblCategorias models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CategoriasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblCategorias model.
     * @param int $id_categoria Id Categoria
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_categoria)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_categoria),
        ]);
    }

    /**
     * Creates a new TblCategorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblCategorias();

        if ($model->load($this->request->post())) {
            $model->fecha_ing = date('Y-m-d H:i:s');
            $model->fecha_mod = date('Y-m-d H:i:s');
            $model->visible = 1;
            $model->id_usuario = Yii::$app->user->identity->id;

            if (!$model->save()) {
                print_r($model->getErrors());
                die();
            }

            Yii::$app->session->setFlash('success', "Registro creado exitosamente.");
            return $this->redirect(['view', 'id_categoria' => $model->id_categoria]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblCategorias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_categoria Id Categoria
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_categoria)
    {
        $model = $this->findModel($id_categoria);

        if ($model->load($this->request->post())) {
            $model->fecha_mod = date('Y-m-d H:i:s');

            if (!$model->save()) {
                print_r($model->getErrors());
                die();
            }

            return $this->redirect(['view', 'id_categoria' => $model->id_categoria]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblCategorias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_categoria Id Categoria
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_categoria)
    {
        //$this->findModel($id_categoria)->delete();
        $model = $this->findModel($id_categoria);
        $model->visible = 0;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblCategorias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_categoria Id Categoria
     * @return TblCategorias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_categoria)
    {
        if (($model = TblCategorias::findOne(['id_categoria' => $id_categoria])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
