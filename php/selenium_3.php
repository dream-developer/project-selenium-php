<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/menu.html";
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get($url);
// タイトル取得
echo $driver->getTitle().PHP_EOL;
// ソース取得
echo $driver->getPageSource().PHP_EOL;
// 現在のURL
echo $driver->getCurrentURL().PHP_EOL;
sleep(3);
$driver->quit();
