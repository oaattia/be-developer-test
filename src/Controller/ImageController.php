<?php 

namespace App\Controller;

use App\Command\CropCommand;

class ImageController extends BaseController
{
    public function crop(string $filename, int $x, int $y, int $w, int $h): void
    {
        $command = new CropCommand(
            $x, 
            $y, 
            $w, 
            $h, 
            $this->getImage($filename), 
            $this->getCroppedOutput($filename)
        );
        $command->execute();
    }

    public function resize(): void
    {
        echo "from resize function";
    }
}
