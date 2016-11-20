<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clientes;

/**
 * ClientesSearch represents the model behind the search form about `app\models\Clientes`.
 */
class ClientesSearch extends Clientes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idClientes', 'prioridad', 'telefono'], 'integer'],
            [['ci_cliente', 'nombre', 'horario_atencion', 'email'], 'safe'],
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
        $query = Clientes::find();

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
            'idClientes' => $this->idClientes,
            'prioridad' => $this->prioridad,
            'telefono' => $this->telefono,
        ]);

        $query->andFilterWhere(['like', 'ci_cliente', $this->ci_cliente])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'horario_atencion', $this->horario_atencion])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
