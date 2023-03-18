<?php

namespace App\Command;

class ResizeCommand implements ImageCommand
{
    private int $width;
    private int $height;
    private string $filename;
    private string $output;

    public function __construct(int $width, int $height, string $filename, string $output) 
    {
        $this->width = $width;
        $this->height = $height;
        $this->filename = $filename;
        $this->output = $output;
    }

    public function execute(): void
    {
        $image = imagecreatefromjpeg($this->filename);
        $resized = imagescale($image, $this->width, $this->height, IMG_BICUBIC_FIXED);
        if ($resized !== false) {
            $this->saveImage($resized);
        }
    }

    private function saveImage($image): void
    {
        imagejpeg($image, $this->output);
    }
}

