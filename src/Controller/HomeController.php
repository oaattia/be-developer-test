<?php 

namespace App\Controller;

class HomeController extends BaseController
{
    public function index(): void
    {
        var_dump($this->getRequestParams('key'));
    }
}
