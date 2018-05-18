<?php

namespace app\models;


use backend\modules\catalog\models\Variant;
use nullref\category\models\Category;



/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property double $price
 * @property integer $code
 * @property integer $vendor_id
 * @property string $material
 * @property integer $category_id
 * @property string $photo_product
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
            [['code', 'vendor_id', 'category_id'], 'integer'],
            [['material', 'photo_product'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Price',
            'code' => 'Code',
            'vendor_id' => 'Vendor ID',
            'material' => 'Material',
            'category_id' => 'Category ID',
            'photo_product' => 'Photo Product',
        ];
    }

    public function getVendor()
    {
        return $this->hasOne(Vendor::className(), ['id' => 'vendor_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

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
