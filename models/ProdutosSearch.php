<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produtos;

/**
 * ProdutosSearch represents the model behind the search form of `app\models\Produtos`.
 */
class ProdutosSearch extends Produtos
{

    public function attributes(){

        return array_merge(parent::attributes(), ['produtoCategoria.categoria_nome']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'produto_categoria_id'], 'integer'],
            [['produto_nome', 'produtoCategoria.categoria_nome'], 'safe'],
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
        $query = Produtos::find();
        $query->joinWith(['produtoCategoria']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['produtoCategoria.categoria_nome'] = [
            'asc' => ['categoria_nome' => SORT_ASC],
            'desc' => ['categoria_nome' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'produto_categoria_id' => $this->produto_categoria_id,
        ]);

        $query->andFilterWhere(['ilike', 'produto_nome', $this->produto_nome])
        ->andFilterWhere(['ilike','categorias.categoria_nome', $this->getAttribute('produtoCategoria.categoria_nome')]);

        return $dataProvider;
    }
}
