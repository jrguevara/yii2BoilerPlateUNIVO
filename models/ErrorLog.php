<?php

namespace app\models;

use app\modules\users\models\Users;
use Yii;

/**
 * This is the model class for table "error_log".
 *
 * @property int $id_error_log
 * @property string $controller
 * @property string $message
 * @property int $id_user
 * @property string $fecha
 *
 * @property Users $us
 */
class ErrorLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'error_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['controller', 'message', 'id_user', 'date'], 'required'],
            [['message'], 'string'],
            [['id_user'], 'integer'],
            [['date'], 'safe'],
            [['controller'], 'string', 'max' => 50],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_error_log' => 'Id',
            'controller' => 'Controller',
            'message' => 'Mensaje',
            'id_user' => 'Usuario',
            'date' => 'Fecha',
        ];
    }

    /**
     * Gets query for [[Us]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUs()
    {
        return $this->hasOne(Users::class, ['id_user' => 'id_user']);
    }
}