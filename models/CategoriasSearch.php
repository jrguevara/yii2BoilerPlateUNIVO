<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblCategorias;

/**
 * CategoriasSearch represents the model behind the search form of `app\models\TblCategorias`.
 */
class CategoriasSearch extends TblCategorias
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_categoria', 'id_usuario', 'visible'], 'integer'],
            [['nombre', 'descripcion', 'fecha_ing', 'fecha_mod'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TblCategorias::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_categoria' => $this->id_categoria,
            'fecha_ing' => $this->fecha_ing,
            'fecha_mod' => $this->fecha_mod,
            'id_usuario' => $this->id_usuario,
            'visible' => $this->visible,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
