<?php

namespace backend\modules\catalog\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * VariantSearch represents the model behind the search form of `app\models\Variant`.
 */
class VariantSearch extends Variant
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'amount', 'product_id', 'quantity'], 'integer'],
            [['size', 'color', 'variant_photo'], 'safe'],
            [['price'], 'number'],
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
        $query = Variant::find();

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
            'amount' => $this->amount,
            'product_id' => $this->product_id,
            'price' => $this->price,
            'quantity' => $this->quantity,
        ]);

        $query->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'variant_photo', $this->variant_photo]);

        return $dataProvider;
    }
}
