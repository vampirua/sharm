<?php
/**
 * Created by PhpStorm.
 * User: Dimon
 * Date: 26.04.2018
 * Time: 11:14
 */

namespace backend\controllers;

use app\models\Position;
use backend\modules\order\models\Order;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class AccountController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
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

    public function actionIndex()
    {
        $id = Yii::$app->user->identity;
        return $this->render('index', ['model' => $id]);

    }

    public function actionFavorite()
    {
        $id = Yii::$app->user->identity;
        return $this->render('favorite', ['model' => $id]);

    }

    public function actionOrder()
    {
        $id = Yii::$app->user->identity;
        $order = Order::find()->where(['user_id' => $id])->all();
        return $this->render('order', ['order' => $order]);

    }

}