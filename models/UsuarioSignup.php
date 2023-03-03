<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * This is the model class for table "tbl_usuarios".
 *
 * @property int $id_usuario
 * @property string $username
 * @property string $nombre
 * @property string $apellido
 * @property string $auth_key
 * @property string $password_hash
 * @property string $email
 * @property string|null $imagen
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class UsuarioSignup extends \yii\db\ActiveRecord
{

    public $username;
    public $email;
    public $nombre;
    public $apellido;
    public $status;
    public $imagen;
    public $password;
    public $authKey;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Nombre de usuario ya existe.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['nombre', 'trim'],
            ['nombre', 'required'],
            ['nombre', 'string', 'min' => 2, 'max' => 255],

            ['apellido', 'trim'],
            ['apellido', 'required'],
            ['apellido', 'string', 'min' => 2, 'max' => 255],

            [['imagen'], 'safe'],
            [['imagen'], 'file', 'extensions' => 'jpg, gif, png'],
            ['imagen', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Direccion de correo ya existe.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['status'], 'integer'],
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
            'password' => 'Password',
            'email' => 'Email',
            'imagen' => 'Imagen',
            'status' => 'Estado',
            'created_at' => 'Fecha de creación',
            'updated_at' => 'Fecha de actualización',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $usuario = new User();
        $usuario->username = $this->username;
        $usuario->email = $this->email;
        $usuario->nombre = $this->nombre;
        $usuario->apellido = $this->apellido;
        $usuario->imagen = $this->imagen;
        $usuario->status = $this->status;
        $usuario->setPassword($this->password);
        $usuario->generateAuthKey();

        return $usuario->save() ? $usuario : null;
    }
}
