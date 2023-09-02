<?php

class Autoloader
{
  public static function register()
  {
    spl_autoload_register(array(__CLASS__, 'autoload'));
  }

  public static function autoload($className)
  {
    $classFile = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($classFile)) {
      require_once $classFile;
    }
  }
}