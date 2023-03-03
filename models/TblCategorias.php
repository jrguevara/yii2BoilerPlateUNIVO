<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_categorias".
 *
 * @property int $id_categoria
 * @property string $nombre
 * @property string|null $descripcion
 * @property string $fecha_ing
 * @property string $fecha_mod
 * @property int $id_usuario
 * @property int $visible
 *
 * @property TblUsuarios $usuario
 */
class TblCategorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_categorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'fecha_ing', 'fecha_mod', 'id_usuario', 'visible'], 'required'],
            [['descripcion'], 'string'],
            [['fecha_ing', 'fecha_mod'], 'safe'],
            [['id_usuario', 'visible'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => TblUsuarios::class, 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_categoria' => 'Id',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'fecha_ing' => 'Fecha Ingreso',
            'fecha_mod' => 'Fecha Modificación',
            'id_usuario' => 'Usuario',
            'visible' => 'Visible',
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
