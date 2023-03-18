<?php 

namespace App;

use App\Exceptions\ViewException;


class ViewRenderer 
{
    private string $viewPath;

    public function __construct(string $viewPath) 
    {
        $this->viewPath = $viewPath;
    }

    public function render(string $template, array $data): void
    {
        $filePath = $this->viewPath . '/' . $template . '.php';
        if (!file_exists($filePath)) {
            throw new ViewException("Template file '$template.php' not found in '$this->viewPath'");
        }

        extract($data);
        include $filePath;
    }
}
