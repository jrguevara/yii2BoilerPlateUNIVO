<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log".
 *
 * @property int $id_log
 * @property int $id_record
 * @property string $controller
 * @property string $action
 * @property string $original_data
 * @property string $updated_data
 * @property int $id_user
 * @property string $date
 *
 * @property Users $user
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_record', 'controller', 'action', 'id_user', 'date'], 'required'],
            [['id_record', 'id_user'], 'integer'],
            [['original_data', 'modified_data'], 'string'],
            [['date'], 'safe'],
            [['controller', 'action'], 'string', 'max' => 25],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_log' => 'Id',
            'id_record' => 'Id Registro',
            'controller' => 'Controlador',
            'action' => 'Accion',
            'data' => 'Data Original',
            'data' => 'Data Modificada',
            'id_user' => 'Usuario',
            'date' => 'Fecha',
        ];
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id_user' => 'id_user']);
    }
}