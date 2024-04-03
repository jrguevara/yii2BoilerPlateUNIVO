<?php

namespace app\modules\users\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id_user
 * @property string $username
 * @property string $name
 * @property string $lastname
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property string|null $picture
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    public function getFullName()
    {
        return $this->name . ' ' . $this->lastname;
    }

    public $password;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['username', 'name', 'lastname', 'auth_key', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'name', 'lastname', 'password_hash', 'email', 'picture' ], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id',
            'username' => 'Usuario',
            'name' => 'Nombre',
            'lastname' => 'Apellido',
            'auth_key' => 'Auth Key',
            'password' => 'Password',
            'password_hash' => 'Password',
            'email' => 'Email',
            'picture' => 'Avatar',
            'status' => 'Estado',
            'created_at' => 'Fecha de creación',
            'updated_at' => 'Fecha de actualización',
        ];
    }
}
