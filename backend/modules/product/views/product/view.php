<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>


        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?php /** @var  $user_id */
        if (\Yii::$app->user->can('admin', ['author_id' => $user_id])): ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'price',
            'code',
            'min_quantity',
            'vendor_id',
            'material',
            'category_id',
            'photo_product',
            'status_product',
            'description',
        ],
    ]) ?>

</div>
