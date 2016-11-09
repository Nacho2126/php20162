<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Favoritos;

/**
 * FavoritosSearch represents the model behind the search form about `app\models\Favoritos`.
 */
class FavoritosSearch extends Favoritos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Clientes_idClientes', 'Inmuebles_idInmuebles'], 'integer'],
            [['idFavorito'], 'safe'],
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
        $query = Favoritos::find();

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
            'Clientes_idClientes' => $this->Clientes_idClientes,
            'Inmuebles_idInmuebles' => $this->Inmuebles_idInmuebles,
        ]);

        $query->andFilterWhere(['like', 'idFavorito', $this->idFavorito]);

        return $dataProvider;
    }
}
