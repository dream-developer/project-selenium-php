<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/tea.html";
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get($url);
// [value='cream'] が無ければ [value='lemon'] の方を取得
if($driver->findElements(WebDriverBy::cssSelector("input[name='included'][value='cream']"))){
    $element = $driver->findElement(WebDriverBy::cssSelector("input[name='included'][value='cream']"));
}else{
    $element = $driver->findElement(WebDriverBy::cssSelector("input[name='included'][value='lemon']"));
}
$element->click();
sleep(3);
$driver->quit();
