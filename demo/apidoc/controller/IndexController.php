<?php
/**
 * Created by PhpStorm.
 * User: 投实科技
 * Date: 2021-10-12
 * Time: 18:33:18
 * Info:
 */

namespace app\apidoc\controller;

use app\BaseController;
use xianrenqh\apidoc_v2\ApiDoc;

class IndexController extends BaseController
{

    public function index()
    {
        return $this->fetch();
    }

    public function getConfig()
    {
        $ApiDoc = new ApiDoc();

        return $ApiDoc->getConfig();
    }

    public function getList()
    {
        $ApiDoc = new ApiDoc();

        return $ApiDoc->getList();
    }

}