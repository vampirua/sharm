<?php

namespace app\models;

use backend\modules\catalog\models\Variant;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class ProductSearch extends Product
{
    public $max_price;
    public $min_price;
    public $color;
    public $size;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'code', 'vendor_id', 'category_id', 'min_price', 'max_price'], 'integer'],
            [['price'], 'number'],
            [['material', 'size', 'color'], 'safe'],
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
        $query = Product::find()
            ->with(['vendor', 'category', 'variant']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
//             $query->where('0=1');`
            return $dataProvider;
        }

        // grid filtering conditions


        $variantQuery = Variant::find()->select(['product_id']);
        if ($this->color) {
            $variantQuery->andWhere(['color' => $this->color]);
        }
        if ($this->size) {
            $variantQuery->andWhere(['size' => $this->size]);
        }

        $productIds = $variantQuery->column();


        $query->andFilterWhere([
            'id'=>$this->id,
            'material' => $this->material,
            'code' => $this->code,
            'vendor_id' => $this->vendor_id,
            'category_id' => $this->category_id,
        ]);

        $query
            ->andFilterWhere(['and',
                ['>', 'price', $this->min_price],
                ['<', 'price', $this->max_price]])
            ->andFilterWhere(['id' => $productIds]);


        return $dataProvider;

    }


}
