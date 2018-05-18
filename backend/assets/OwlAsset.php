<?php
/**
 * Created by PhpStorm.
 * User: Dimon
 * Date: 10.05.2018
 * Time: 08:49
 */

namespace backend\assets;

use yii\web\AssetBundle;

class OwlAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'script/owl/owl.carousel.js',
    ];
    public $css = [
        'script/owl/assets/owl.carousel.css',
        'script/owl/assets/owl.theme.default.css',
        'script/owl/assets/owl.theme.green.css',
    ];
}
