<?php

namespace App\Config;

class Env 
{
    private $vars = [];

    public function __construct() 
    {
        $this->load();
    }

    public function load(): void
    {
        $file = __DIR__ . '/../../.env';
        if (file_exists($file)) {
            $contents = file_get_contents($file);
            $lines = explode("\n", $contents);
            foreach ($lines as $line) {
                if (!empty(trim($line)) && strpos(trim($line), '#') !== 0) {
                    list($key, $value) = explode('=', $line, 2);
                    $this->set(trim($key), trim($value));
                }
            }
        }
    }

    public function set($key, $value): void
    {
        $this->vars[$key] = $value;
    }

    public function get(string $key, string $default = null): ?string
    {
        return $this->has($key) ? $this->vars[$key] : $default;
    }

    public function has(string $key): bool
    {
        return isset($this->vars[$key]);
    }
}
