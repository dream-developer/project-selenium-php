<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/menu.html";
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get($url);
// テキストリンクがCoffeeの要素を取得しクリック
$element = $driver->findElement(WebDriverBy::linkText("Coffee"));
$element->click();
sleep(1);
// ページ更新
$driver->navigate()->refresh();
sleep(1);
// 前に戻る
$driver->navigate()->back();
sleep(1);
// 次に進む
$driver->navigate()->forward();
echo $driver->getCurrentURL().PHP_EOL;
sleep(3);
$driver->quit();
