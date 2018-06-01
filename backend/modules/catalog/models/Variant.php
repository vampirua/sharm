<?php

namespace backend\modules\catalog\models;

use app\models\Position;
use app\models\Product;

use backend\modules\color\models\Color;
use yz\shoppingcart\CartPositionInterface;

/**
 * This is the model class for table "variant".
 *
 * @property int $id
 * @property string $size
 * @property string $color
 * @property int $amount
 * @property int $product_id
 * @property double $price
 * @property string $variant_photo
 * @property int $quantity
 *
 * @property Position $position
 * @property Product $product
 */
class Variant extends \yii\db\ActiveRecord implements CartPositionInterface
{
    public $quantity;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'variant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'product_id'], 'integer'],
            [['price'], 'number'],
            [['size', 'color_id', 'variant_photo'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'size' => 'Size',
            'color_id' => 'Color',
            'amount' => 'Amount',
            'product_id' => 'Product ID',
            'price' => 'Price',
            'variant_photo' => 'Variant Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['variant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @inheritdoc
     * @return \yii\db\ActiveQuery
     */


    public function getColor()
    {
        return $this->hasOne(Color::className(), ['id' => 'color_id']);
    }

    public static function find()
    {
        return new VariantQuery(get_called_class());
    }

    /**
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param bool $withDiscount
     * @return integer
     */
    public function getCost($withDiscount = true)
    {
        // TODO: Implement getCost() method.
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }


}
