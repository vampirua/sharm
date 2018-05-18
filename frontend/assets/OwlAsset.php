<?php
/**
 * Created by PhpStorm.
 * User: Dimon
 * Date: 10.05.2018
 * Time: 08:49
 */

namespace frontend\assets;

use yii\web\AssetBundle;

class OwlAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'script/owl/js/owl.carousel.js',
    ];
    public $css = [
        'script/owl/scss/owl.carousel.scss'
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}
