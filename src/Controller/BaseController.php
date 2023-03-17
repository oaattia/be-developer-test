<?php

namespace App\Controller;

use App\Config\Env;

class BaseController
{
    private array $request;
    private string $image;
    private string $croppedOutput;
    private string $resizedOutput;

    public function __construct()
    {
        $env = new Env();

        $imagePath = __DIR__ . '/../../' .  $env->get('IMAGE_PATH');
        $croppedOutputPath = __DIR__ . '/../../' . $env->get('CROPPED_PATH');
        $resizedOutputPath = __DIR__ . '/../../' . $env->get('RESIZED_PATH');

        $this->request = $_REQUEST;
        $this->image = $imagePath;
        $this->croppedOutput = $croppedOutputPath;
        $this->resizedOutput = $resizedOutputPath;
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
        return $this->croppedOutput . $filename;
    }

    protected function getResizedOutput(string $filename): string
    {
        return $this->resizedOutput . $filename;
    }
}
