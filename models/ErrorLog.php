<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_error_log".
 *
 * @property int $id_error_log
 * @property string $controller
 * @property string $mensaje
 * @property int $us_id
 * @property string $fecha
 *
 * @property Usuarios $us
 */
class ErrorLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_error_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['controller', 'mensaje', 'us_id', 'fecha'], 'required'],
            [['mensaje'], 'string'],
            [['us_id'], 'integer'],
            [['fecha'], 'safe'],
            [['controller'], 'string', 'max' => 50],
            [['us_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::class, 'targetAttribute' => ['us_id' => 'id_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_error_log' => 'Id Error Log',
            'controller' => 'Controller',
            'mensaje' => 'Mensaje',
            'us_id' => 'Us ID',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * Gets query for [[Us]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUs()
    {
        return $this->hasOne(Usuarios::class, ['id_usuario' => 'us_id']);
    }
}