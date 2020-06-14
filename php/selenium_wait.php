<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
require_once("vendor/autoload.php");
$host = "http://localhost:9515";
$capabilities = DesiredCapabilities::chrome();
$url = "file:///C:/Users/writer/study_work/html/wait.html";
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->get($url);
// 要素(id='msg')が現れるまで待機
$driver->wait(10)->until(
  WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id("msg"))
);
echo $driver->findElement(WebDriverBy::id("msg"))->getText().PHP_EOL;
// 要素(id='btn')がクリック可能まで待機
$driver->wait(10)->until(
  WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::id("btn"))
);
echo $driver->findElement(WebDriverBy::id("btn"))->getAttribute("value").PHP_EOL;
sleep(3);
$driver->quit();
