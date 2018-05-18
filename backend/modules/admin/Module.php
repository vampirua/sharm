<?php
/**
 * Created by PhpStorm.
 * User: Dimon
 * Date: 14.11.2017
 * Time: 18:39
 */

namespace backend\modules\admin;

use nullref\admin\Module as BaseModule;

class Module extends BaseModule
{
    public function setBasePath($path)
    {
        $path = '@vendor/nullref/admin';
        parent::setBasePath($path);
    }

}