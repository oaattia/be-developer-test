<?php

namespace App\Command;

class CropCommand implements ImageCommand
{
    private int $x;
    private int $y;
    private int $width;
    private int $height;
    private string $filename;

    public function __construct(int $x, int $y, int $width, int $height, string $filename) 
    {
        $this->x = $x;
        $this->y = $y;
        $this->width = $width;
        $this->height = $height;
        $this->filename = $filename;
    }

    public function execute(): void
    {
        $image = imagecreatefromjpeg($this->filename);
        $crop = imagecrop($image, ['x' => $this->x, 'y' => $this->y, 'width' => $this->width, 'height' => $this->height]);
        if ($crop !== false) {
            imagejpeg($crop, $this->filename); 
        }
    }
}

