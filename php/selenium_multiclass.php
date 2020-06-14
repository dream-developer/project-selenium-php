<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/multiclass.html";
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get($url);
// multiclass.html にアクセス
$elements = $driver->findElements(WebDriverBy::cssSelector(".want.need"));
foreach($elements as $element){
    echo $element->getText().PHP_EOL;
}
sleep(3);
$driver->quit();
