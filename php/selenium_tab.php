<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url_menu = "file:///C:/Users/writer/study_work/html/menu.html";
$url_coffee = "file:///C:/Users/writer/study_work/html/coffee.html";
$driver = RemoteWebDriver::create($host, $capabilities);
// [1] このタブは1つめなので $driver->getWindowHandles()[0]
$driver->get($url_menu);
sleep(1);
// [2] このタブは2つめなので $driver->getWindowHandles()[1]
$driver->executeScript("window.open('${url_coffee}');");
sleep(1);
// [3] 2つめのタブに移動
$driver->switchTo()->window($driver->getWindowHandles()[1]);
echo $driver->getTitle().PHP_EOL;
// [4] 1つめのタブに移動
$driver->switchTo()->window($driver->getWindowHandles()[0]);
sleep(1);
echo $driver->getTitle().PHP_EOL;
// [5] 2つめのタブに移動と閉じる
$driver->switchTo()->window($driver->getWindowHandles()[1]);
$driver->close();
sleep(3);
$driver->quit();
