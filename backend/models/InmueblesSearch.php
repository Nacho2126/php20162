<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Inmuebles;

/**
 * InmueblesSearch represents the model behind the search form about `backend\models\Inmuebles`.
 */
class InmueblesSearch extends Inmuebles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cant_dormitorios', 'cant_banios', 'mts_totales', 'mts_edificados', 'cant_pisos', 'id_tipoinmueble', 'id_Barrio', 'user_id', 'cant_imagenes'], 'integer'],
            [['nombre', 'descripcion', 'garantia', 'tipo_operacion', 'direccion', 'cordx', 'cordy', 'file'], 'safe'],
            [['cochera', 'patio'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Inmuebles::find();

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
            'id' => $this->id,
            'cant_dormitorios' => $this->cant_dormitorios,
            'cant_banios' => $this->cant_banios,
            'mts_totales' => $this->mts_totales,
            'mts_edificados' => $this->mts_edificados,
            'cochera' => $this->cochera,
            'patio' => $this->patio,
            'cant_pisos' => $this->cant_pisos,
            'id_tipoinmueble' => $this->id_tipoinmueble,
            'id_Barrio' => $this->id_Barrio,
            'user_id' => $this->user_id,
            'cant_imagenes' => $this->cant_imagenes,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'garantia', $this->garantia])
            ->andFilterWhere(['like', 'tipo_operacion', $this->tipo_operacion])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'cordx', $this->cordx])
            ->andFilterWhere(['like', 'cordy', $this->cordy])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
