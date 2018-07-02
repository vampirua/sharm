<?php

namespace backend\controllers;

use app\models\CatalogSearch;
use app\models\Subscribers;
use backend\modules\catalog\models\Variant;
use common\models\RegistrationForm;
use common\models\User;
use yii\web\Response;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\LoginForm;
use app\models\ProductSearch;
use yii\web\NotFoundHttpException;
use app\models\Product;
use backend\widgets\Size;

/**
 * Site controllers
 */
class SiteController extends Controller
{


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update'],
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'check', 'logout'],
                        'allow' => true,
                        'roles' => ['?']
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionMain()
    {

        return $this->render('main');
    }

    public function actionSubscriber()
    {
        $sub = Yii::$app->request->post('subscriber');
        $add = new Subscribers();
        $add->email = $sub;
        $add->save();
        return $this->redirect('index');
    }


    public function actionCategory()
    {
        $searchModel = new CatalogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('category', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * @param $id
     * @return Product
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }


    public function actionLogout()
    {

        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * @return string|Response
     * @throws \yii\base\Exception
     */
    public function actionRegistration()
    {
        if (!Yii::$app->user->isGuest) {

            return $this->goHome();
        }

        $model = new RegistrationForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            $user = new User();

            $user->username = $model->username;
            $user->auth_key = $model->password;
            $user->email = $model->email;
            $user->phone = $model->phone;
            $user->password_hash = \Yii::$app->security->generatePasswordHash($model->password);

            if ($user->save()) {

                return $this->goHome();

            }

        }
        return $this->render('regisitration', compact('model'));

    }

    public function actionCheck($id, $color)
    {

        $size = Variant::find()->where(['product_id' => $id])->andWhere(['color_id' => $color])->all();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {

            return Size::widget(['size' => $size]);
        }

    }

    public function actionAbout()
    {
        return $this->render('about');
    }


}
