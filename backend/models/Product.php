<?php

namespace app\models;

use backend\modules\catalog\models\Variant;
use backend\modules\statusproduct\models\Statusproduct;
use nullref\category\models\Category;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property double $price
 * @property int $code
 * @property int $min_quantity
 * @property int $vendor_id
 * @property string $material
 * @property int $category_id
 * @property string $photo_product
 * @property int $status_product
 *
 * @property Favorite $favorite
 * @property Category $category
 * @property Vendor $vendor
 * @property Statusproduct $statusProduct
 * @property Variant[] $variants
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['code', 'min_quantity', 'vendor_id', 'category_id', 'status_product'], 'integer'],
            [['name', 'material', 'photo_product'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['vendor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vendor::className(), 'targetAttribute' => ['vendor_id' => 'id']],
            [['status_product'], 'exist', 'skipOnError' => true, 'targetClass' => Statusproduct::className(), 'targetAttribute' => ['status_product' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'code' => 'Code',
            'min_quantity' => 'Min Quantity',
            'vendor_id' => 'Vendor ID',
            'material' => 'Material',
            'category_id' => 'Category ID',
            'photo_product' => 'Photo Product',
            'status_product' => 'Status Product',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavorite()
    {
        return $this->hasOne(Favorite::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(Vendor::className(), ['id' => 'vendor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusProduct()
    {
        return $this->hasOne(Statusproduct::className(), ['id' => 'status_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVariant()
    {
        return $this->hasMany(Variant::className(), ['product_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}
