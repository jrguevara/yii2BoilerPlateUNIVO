<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\UserSignup;
use yii\filters\VerbFilter;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
     * Lists all Users models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param int $id_user Id User
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_user)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_user),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UserSignup();

        if ($model->load(Yii::$app->request->post())) {
            $upload = UploadedFile::getInstance($model, 'picture');
            if (empty($upload)) {
                $name = $this->request->baseUrl . '/avatars/default.png';
                $model->picture = $name;
            } else {
                $tmp = explode(".", $upload->name);
                $ext = end($tmp);
                $name = Yii::$app->security->generateRandomString() . ".{$ext}";
                $path = Yii::$app->basePath . '/web/avatars/' . $name;
                $path2 = Yii::$app->request->baseUrl . '/avatars/' . $name;
                $model->picture = $path2;
                $upload->saveAs($path);
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
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_user Id User
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_user)
    {
        $model = $this->findModel($id_user);

        $j = $model->password_hash;   
        
        if ($model->load(Yii::$app->request->post())) {
                // maybe remove this if to get URL of image from callback
            $upload = UploadedFile::getInstance($model, 'picture');

            if (empty($upload)) {
                $model->picture = $_POST['Users']['picture'];
            } else {
                $tmp = explode(".", $upload->name);
                $ext = end($tmp);
                $name = Yii::$app->security->generateRandomString() . ".{$ext}";
                $path = Yii::$app->basePath . '/web/avatars/' . $name;
                $path2 = Yii::$app->request->baseUrl . '/avatars/' . $name;;
                $model->picture = $path2;
                $upload->saveAs($path);
            }

            $i = $_POST['Users']['password_hash'];
            if (empty($i)) {
                $model->password_hash = $j;
            } else {
                $new_password = Yii::$app->security->generatePasswordHash($i);
                $model->password_hash = $new_password;
            }

            $model->save();
            return $this->redirect(['view', 'id_user' => $model->id_user]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_user Id User
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_user)
    {
        //$this->findModel($id_user)->delete();
        $model = $this->findModel($id_user);
        $model->status = 0;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_user Id User
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_user)
    {
        if (($model = Users::findOne(['id_user' => $id_user])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
