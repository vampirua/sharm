<?php
/**
 * Created by PhpStorm.
 * User: Dimon
 * Date: 25.12.2017
 * Time: 12:25
 */

namespace backend\controllers;

use app\models\Position;
use app\models\Product;
use backend\modules\catalog\models\Variant;
use backend\modules\order\models\Order;
use Yii;
use backend\CartTrait\TraitCart;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yz\shoppingcart\ShoppingCart;

/**
 * Class CartController
 * @package app\controllers
 */
class CartController extends Controller
{
    use TraitCart;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update'],
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'add', 'remove', 'clear'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    /**
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionAdd()
    {
        $id = Yii::$app->request->post('product-id');
        $color = Yii::$app->request->post('color');
        $size = Yii::$app->request->post('size');
        $quantity = Yii::$app->request->post('quantity');

        if (Yii::$app->request->isPost) {
            $model = Variant::find()
                ->andWhere(['product_id' => $id])
                ->andWhere(['color_id' => $color])
                ->andWhere(['size' => $size])
                ->one();


            $cart = new ShoppingCart();
            $cart->put($model, $quantity);
            return $this->redirect(['/cart']);
        }

    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionRemove($id)
    {
        $model = $this->cart->getPositionById($id);
        if ($model) {
            $this->cart->remove($model);
            if (Yii::$app->request->isAjax) {
                return $this->redirect('/cart');
            }
            return $this->redirect(['index']);
        }
        throw new NotFoundHttpException();
    }


    public function actionClear()
    {
        $this->cart->removeAll();
        $this->redirect(['index']);
    }


    public function actionIndex()
    {

        $items = $this->cart->getPositions();

        if (empty($items)) {
            $this->redirect('/');
        } else {

            return $this->render('index', ['items' => $items]);
        }
    }


    public function actionSave()
    {
        $user_id = Yii::$app->user->identity->getId();

        $order = new Order();
        $order->user_id = $user_id;
        $order->save();
        $items = $this->cart->getPositions();


        foreach ($items as $item) {


            $variant = new Position();

            $variant->variant_id = $item->id;
            $variant->amount = $item->quantity;
            $variant->price = $item->price;
            $variant->order_id = $order->id;
            $variant->save();

        }

        $this->cart->removeAll();
        $this->redirect(['index']);

    }


}