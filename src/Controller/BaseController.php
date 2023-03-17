<?php

namespace App\Controller;

class BaseController
{
    protected array $request;

    public function __construct()
    {
        $this->request = $_REQUEST;
    }

    protected function getRequestParams(string $key, mixed $default = null): mixed
    {
        return $this->request[$key] ?? $default;
    }
}
