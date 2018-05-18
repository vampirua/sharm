<?php
/**
 * Created by PhpStorm.
 * User: Dimon
 * Date: 05.12.2017
 * Time: 14:52
 */

namespace backend\widgets;

use app\models\Product;
use backend\modules\catalog\models\Variant;
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
        $model = Product::find()->where(['id' => $ProductID])->with(['variant'])->one();
        return $this->render('one', [
            'model' => $model
        ]);

    }
}


