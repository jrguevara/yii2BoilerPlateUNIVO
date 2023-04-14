<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_usuarios".
 *
 * @property int $id_usuario
 * @property string $username
 * @property string $nombre
 * @property string $apellido
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property string|null $imagen
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_usuarios';
    }

    public function getNombreCompleto()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'nombre', 'apellido', 'auth_key', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'nombre', 'apellido', 'password_hash', 'email', 'imagen' ], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id',
            'username' => 'Usuario',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'email' => 'Email',
            'imagen' => 'Imagen',
            'status' => 'Estado',
            'created_at' => 'Fecha de creación',
            'updated_at' => 'Fecha de actualización',
        ];
    }
}
