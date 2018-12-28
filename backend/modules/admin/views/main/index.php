<?php
/**
 * Created by PhpStorm.
 * User: Dimon
 * Date: 12.12.2018
 * Time: 10:09
 */

/** @var integer $new_order  count new  order */
?>
<div class="container">
    <h1>
        Панель управления
    </h1>
<?php \yii\helpers\VarDumper::class?>

<div class="row">
    <div class="col-sm-4">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Нових заказов  <span class="badge pull-right"><?=
                $new_order?></span> <b class="caret"></b></a>
        <ul class="dropdown-menu">3
            <li><a href="#">Действие</a></li>
            <li><a href="#">Другое действие</a></li>
            <li><a href="#">Что-то еще</a></li>
    </div>
    <div class="col-sm-4"></div>
    <div class="col-sm-4"></div>
</div>



</div>