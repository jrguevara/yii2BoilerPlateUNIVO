<?php

namespace app\modules\users\models;


use Yii;
use yii\base\Model;
use app\models\User;

/**
 * This is the model class for table "users".
 *
 * @property int $id_user
 * @property string $username
 * @property string $name
 * @property string $lastname
 * @property string $password_hash
 * @property string $email
 * @property string|null $picture
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class userRegister extends \yii\db\ActiveRecord
{

    public $username;
    public $email;
    public $name;
    public $lastname;
    public $status;
    public $picture;
    public $password;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\UserIdentity', 'message' => 'Nombre de usuario ya existe.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 255],

            ['lastname', 'trim'],
            ['lastname', 'required'],
            ['lastname', 'string', 'min' => 2, 'max' => 255],

            [['picture'], 'safe'],
            [['picture'], 'file', 'extensions' => 'jpg, gif, png'],
            ['picture', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\UserIdentity', 'message' => 'Direccion de correo ya existe.'],

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
            'id_user' => 'Id',
            'username' => 'user',
            'name' => 'Nombre',
            'lastname' => 'Apellido',
            'password' => 'Password',
            'email' => 'Email',
            'picture' => 'Imagen',
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

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->name = $this->name;
        $user->lastname = $this->lastname;
        $user->picture = $this->picture;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}
