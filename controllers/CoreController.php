<?php
namespace app\controllers;

use Yii;
use Exception;
use yii\helpers\Html;
use app\models\TblErrorLog;

class CoreController
{
/**funcion catch de todas las funciones del controller */
    public static function getErrorLog($idUsuario, $e, $controlador)
    {
        Yii::$app->getSession()->setFlash('error', "La transaccion no se pudo completar. Intentelo de nuevo o consulte al administrador.");
        Yii::$app->getSession()->setFlash('warning', nl2br(Html::encode($e)));
        //Guardar en bdd
        //mensaje de error, datetime, IdUsuario, controlador, id de la acción, retornar
        $errorLog = new TblErrorLog();
        //$errorLog->mensaje = $e->getMessage();
        $errorLog->mensaje = nl2br(Html::encode($e));
        $errorLog->fecha = date("Y-m-d H:i:s");
        $errorLog->us_id = $idUsuario;
        $errorLog->controller = $controlador;
        
        try{
            $errorLog->save();
        }
        catch(Exception $e){
            Yii::$app->getSession()->setFlash('error','No se pudo enviar el registro de error al servidor.');
        }
    }

    /**funcion catch de todas las funciones del controller */
    public static function showNotificacion($title, $text, $type, $timer, $button)
    {
        Yii::$app->getSession()->setFlash('success', [
            'title' => $title,
            'text' => $text,
            'type' => $type,
            'timer' => $timer,
            'showConfirmButton' => $button
        ]);
    }
}
?>