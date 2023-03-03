<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\InicioModel;

class InicioController extends Controller
{
    /**
     * Muestra vista index.
     *
     *? http://yii2basico.local/index.php?r=inicio/index
     */
    public function actionIndex()
    {
        $mensaje = 'Yes, it is';
        $h2 = 'UNIVO';
        $dateTime = new \DateTime();

        return $this->render('index', [
            'mensaje' => $mensaje,
            'h2' => $h2,
            'dateTime' => $dateTime,
        ]);
    }

    /**
     * Muestra vista suma.
     *
     *? http://yii2basico.local/index.php?r=inicio/suma
     */
    public function actionSuma()
    {
        $model = new InicioModel();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $resultado = $model->valor_a + $model->valor_b;
            $respuesta = ("El resultado es: " . $resultado);

            return $this->render('suma', [
                'model' => $model,
                'respuesta' => $respuesta
            ]);
        }

        return $this->render('suma', [
            'model' => $model,
        ]);
    }

    /**
     * Muestra vista resta.
     *
     *? http://yii2basico.local/index.php?r=inicio/resta
     */
    public function actionResta()
    {
        $valor_a = 60;
        $valor_b = 8;
        $resultado = $valor_a - $valor_b;

        return $this->render('resta', [
            'resultado' => $resultado
        ]);
    }
}
