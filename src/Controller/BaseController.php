<?php

namespace App\Controller;

use App\Config\Env;
use App\ViewRenderer;

class BaseController
{
    protected array $request;
    protected string $image;
    protected string $modifiedOutput;
    protected ViewRenderer $view;

    public function __construct()
    {
        $this->request = $_REQUEST;
        $this->view = new ViewRenderer(__DIR__ . '/../../views');
        $env = new Env();
        $this->image = __DIR__ . '/../../' .  $env->get('IMAGE_PATH');
        $this->modifiedOutput = __DIR__ . '/../../' . $env->get('MODIFIED_IMG_PATH');
    }

    protected function getRequestParams(string $key, mixed $default = null): mixed
    {
        return $this->request[$key] ?? $default;
    }

    protected function getImage(string $filename): string
    {
        return $this->image . $filename;
    }

    protected function getCroppedOutput(string $filename): string
    {
        return $this->modifiedOutput . 'cropped_' . $filename;
    }

    protected function getResizedOutput(string $filename): string
    {
        return $this->modifiedOutput . 'resized_' . $filename;
    }
}
