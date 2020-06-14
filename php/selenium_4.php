<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
// WebDriverBy
use Facebook\WebDriver\WebDriverBy;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/menu.html";
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get($url);
// h1タグのテキスト
$tags_h1 = $driver->findElements(WebDriverBy::tagName("h1"));
foreach($tags_h1 as $h1){
    echo $h1->getText().PHP_EOL;
}
// aタグのテキストとhref属性の値
$tags_a = $driver->findElements(WebDriverBy::tagName("a"));
foreach($tags_a as $a){
    echo $a->getText()." ".$a->getAttribute("href").PHP_EOL;
}
// ulタグの数 → 1
echo count($driver->findElements(WebDriverBy::tagName("ul"))).PHP_EOL;
// liタグの数 → 2
echo count($driver->findElements(WebDriverBy::tagName("li"))).PHP_EOL;
// ulタグのテキストを取得
echo $driver->findElements(WebDriverBy::tagName("ul"))[0]->getText().PHP_EOL;
// aタグ２つめのテキスト → Tea
echo $driver->findElements(WebDriverBy::tagName("a"))[1]->getText().PHP_EOL;
// aタグ２つめをクリック
sleep(1);
$driver->findElements(WebDriverBy::tagName("a"))[1]->click();
sleep(3);
$driver->quit();
