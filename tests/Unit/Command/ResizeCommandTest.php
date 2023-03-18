<?php

namespace Test\Unit\Command;


use App\Command\ResizeCommand;
use PHPUnit\Framework\TestCase;

class ResizeCommandTest extends TestCase
{
    private string $filename;
    private string $output;
    
    protected function setUp(): void
    {
        $this->filename = 'test.jpg';
        $this->output = 'test_resized.jpg';
        
        $image = imagecreatetruecolor(100, 100);
        imagejpeg($image, $this->filename);
        imagedestroy($image);
    }
    
    protected function tearDown(): void
    {
        unlink($this->filename);
        unlink($this->output);
    }
    
    public function testExecute(): void
    {
        $command = new ResizeCommand(50, 50, $this->filename, $this->output);
        
        $command->execute();
        
        $this->assertFileExists($this->output);
        
        [$width, $height] = getimagesize($this->output);
        
        $this->assertEquals(50, $width);
        $this->assertEquals(50, $height);
    }
}
