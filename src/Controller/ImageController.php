<?php 

namespace App\Controller;

use App\Command\CropCommand;
use App\Command\ResizeCommand;

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
            $outputImage = $this->getCroppedOutput($filename)
        );
        $command->execute();

        $redirectedPath = basename($outputImage);
        header("Location: /$redirectedPath");
    }


    public function resize(string $filename, int $w, int $h): void
    {
        $command = new ResizeCommand(
            $w, 
            $h, 
            $this->getImage($filename), 
            $outputImage = $this->getResizedOutput($filename)
        );
        $command->execute();

        $redirectedPath = basename($outputImage);
        header("Location: /$redirectedPath");
    }


    public function index(string $filename): void
    {
        $this->view->render('image/index', ['filename' => $filename]);
    }
}
