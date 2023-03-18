<?php 

namespace Test\Unit\Command;

use App\Command\CropCommand;

use PHPUnit\Framework\TestCase;

class CropCommandTest extends TestCase
{
    private string $filename;
    private string $outputFile;

    protected function setUp(): void
    {
        $this->filename = 'test.jpg';
        $this->outputFile = 'test_cropped.jpg';

        $image = imagecreatetruecolor(100, 100);
        imagejpeg($image, $this->filename);
        imagedestroy($image);
    }

    protected function tearDown(): void
    {
        unlink($this->filename);
        unlink($this->outputFile);
    }

    public function testExecute(): void
    {
        $command = new CropCommand(25, 25, 50, 50, $this->filename, $this->outputFile);

        $command->execute();

        $this->assertFileExists($this->outputFile);

        [$width, $height] = getimagesize($this->outputFile);

        $this->assertEquals(50, $width);
        $this->assertEquals(50, $height);

        // assert that the top-left pixel of the cropped image is black (RGB 0,0,0)
        $image = imagecreatefromjpeg($this->outputFile);
        $colorIndex = imagecolorat($image, 0, 0);
        $color = imagecolorsforindex($image, $colorIndex);
        imagedestroy($image);
        $this->assertEquals(0, $color['red']);
        $this->assertEquals(0, $color['green']);
        $this->assertEquals(0, $color['blue']);
    }
}
