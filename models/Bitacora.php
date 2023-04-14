<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_bitacora".
 *
 * @property int $id_bitacora
 * @property int $id_registro
 * @property string $controlador
 * @property string $accion
 * @property string $data_original
 * @property string $data_modificada
 * @property int $id_usuario
 * @property string $fecha
 *
 * @property Usuarios $usuario
 */
class Bitacora extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_bitacora';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registro', 'controlador', 'accion', 'id_usuario', 'fecha'], 'required'],
            [['id_registro', 'id_usuario'], 'integer'],
            [['data_original', 'data_modificada'], 'string'],
            [['fecha'], 'safe'],
            [['controlador', 'accion'], 'string', 'max' => 25],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::class, 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bitacora' => 'Id Bitacora',
            'id_registro' => 'Id Registro',
            'controlador' => 'Controlador',
            'accion' => 'Accion',
            'data' => 'Data Original',
            'data' => 'Data Modificada',
            'id_usuario' => 'Usuario',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::class, ['id_usuario' => 'id_usuario']);
    }
}