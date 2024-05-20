<?php
namespace MyApp\Config;

use MyApp\Core\DotEnv;

class Config
{
  public static function load()
  {
    (new DotEnv(__DIR__ . '../../.env'))->load();

    define('BASEURL', getenv('BASE_URL'));
    // index.php atau di file konfigurasi utama
    define('ROOT_PATH', realpath(dirname(__FILE__)) . '/');
  }
}