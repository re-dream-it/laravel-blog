<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\BaseController as AdminBaseController;

abstract class BaseController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }
}