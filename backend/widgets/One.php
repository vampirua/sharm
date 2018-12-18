<?php
/**
 * Created by PhpStorm.
 * User: Dimon
 * Date: 05.12.2017
 * Time: 14:52
 */

namespace backend\widgets;

use backend\modules\product\models\Product;
use backend\modules\catalog\models\Variant;
use backend\modules\color\models\Color;
use backend\modules\vendor\models\Vendor;
use Yii;
use yii\bootstrap\Widget;


/**
 * @var $model Product
 * @var $variant Variant
 */
class One extends Widget
{

    public function run()
    {
        $ProductID = Yii::$app->request->get('id');
        $model = Product::find()->with('vendor','variant', 'variant.color')->where(['id' => $ProductID])->one();
        $colors = Color::find()->innerJoinWith('variants')->OnCondition("variant.product_id =  $ProductID")->andOnCondition('color.id = variant.color_id')->all();
        $vendor = Vendor::find()->where(['id' => $model->vendor_id])->select('country')->one();
        return $this->render('one', [
            'model' => $model,
            'colors' => $colors,
            'vendor' => $vendor
        ]);

    }
}


