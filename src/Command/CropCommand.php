<?php

namespace App\Command;

class CropCommand implements ImageCommand
{
    private int $x;
    private int $y;
    private int $width;
    private int $height;
    private string $filename;
    private string $outputFile;

    public function __construct(int $x, int $y, int $width, int $height, string $filename, string $outputFile) 
    {
        $this->x = $x;
        $this->y = $y;
        $this->width = $width;
        $this->height = $height;
        $this->filename = $filename;
        $this->outputFile = $outputFile;
    }

    public function execute(): void
    {
        $image = imagecreatefromjpeg($this->filename);
        $crop = imagecrop($image, ['x' => $this->x, 'y' => $this->y, 'width' => $this->width, 'height' => $this->height]);
        if ($crop !== false) {
            imagejpeg($crop, $this->outputFile); 
        }
    }
}

