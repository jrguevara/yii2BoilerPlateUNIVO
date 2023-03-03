<?php

namespace app\models;

use Yii;
use yii\base\Model;

class InicioModel extends Model
{
    public $valor_a;
    public $valor_b;

    public function rules(){
        return [
            [['valor_a', 'valor_b'], 'required'],
            [['valor_a', 'valor_b'], 'number'],
        ];
    }
}