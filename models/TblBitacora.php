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
 * @property string $data
 * @property int $id_usuario
 * @property string $fecha
 *
 * @property TblUsuarios $usuario
 */
class TblBitacora extends \yii\db\ActiveRecord
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
            [['id_registro', 'controlador', 'accion', 'data', 'id_usuario', 'fecha'], 'required'],
            [['id_registro', 'id_usuario'], 'integer'],
            [['data'], 'string'],
            [['fecha'], 'safe'],
            [['controlador', 'accion'], 'string', 'max' => 25],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => TblUsuarios::class, 'targetAttribute' => ['id_usuario' => 'id_usuario']],
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
            'data' => 'Data',
            'id_usuario' => 'Id Usuario',
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
        return $this->hasOne(TblUsuarios::class, ['id_usuario' => 'id_usuario']);
    }
}
