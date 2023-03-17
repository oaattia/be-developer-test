<?php

namespace App\Command;

class ResizeCommand implements ImageCommand
{
    private int $x;
    private int $y;
    private int $width;
    private int $height;
    private string $filename;

    public function __construct(int $width, int $height, string $filename) 
    {
        $this->width = $width;
        $this->height = $height;
        $this->filename = $filename;
    }

    public function execute(): void
    {
        $image = imagecreatefromjpeg($this->filename);
        $resized = imagescale($image, $width, $height, IMG_BICUBIC_FIXED);
        if ($resized !== false) {
            $this->width = $width;
            $this->height = $height;
            $this->saveImage($resized);
        }
    }

    private function saveImage($image): void
    {
        imagejpeg($image, $this->filename);
    }
}

