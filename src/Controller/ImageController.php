<?php 

namespace App\Controller;

use App\Config\Env;

class ImageController extends BaseController
{
    public function crop(string $filename, int $x, int $y, int $w, int $h): void
    {
        $env = new Env();
        $imagePath = $env->get('IMAGE_PATH');
        var_dump($imagePath, $filename, $x, $y, $w, $h);
    }

    public function resize(): void
    {
        echo "from resize function";
    }
}
